@extends('admin.app')
@section('content')
@section('title')
<h2>Add Product</h2>
@endsection


<form action="{{route('admin.product.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    @csrf

    @if(session()->has('message'))
      <div class = 'alert alert-success'>

          {{session('message')}}
          
      </div >

      @endif

    <div class="row">

        <div class="col-md-3 order-md-2 mb-4">
            <ul class="list-group list-unstyled row">

                <li class="list-group-item active">
                    <h5>Status</h5>
                </li>

                <li class="list-group-item">
                    <select class="form-control" name="statusSelect" id="statusSelect">
                        <option value="0" @if(@$eproduct->statusSelect == 0){{'selected'}}@endif>Public</option>
                        <option value="1" @if(@$eproduct->statusSelect == 1){{'selected'}}@endif>Private</option>
                    </select>

                </li>
                <li class="list-group-item active">
                    <h5>Featured</h5>
                </li>
                <li class="list-group-item">

                    <div class="custom-file">
                        <input type="file" name="ProductImage" class="custom-file-input" id="thumbnail"
                            aria-describedby="productImage">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </li>
                <li class="img-thumbnail">
                    <img name="FeaturedImage"
                        src="@if(@$eproduct) {{asset(@$eproduct->thumbnail)}} @else {{asset('asset/image/NoImage/noimage3.jpg')}} @endif"
                        id="imgthumbnail" class="img-fluid" alt="">
                    <div class="input-group-prepend justify-content-center">
                        <span class="input-group-text">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="FeaturedImage" class="custom-control-input"
                                    id="defaultUnchecked" @if(@$eproduct->featured ==1) {{'checked'}} @endif>
                                <label class="custom-control-label" for="defaultUnchecked"></label>
                                Featured Images
                            </div>
                        </span>
                    </div>
                </li>
                <li class="list-group-item active">
                    <h5>Select Catagory</h5>
                </li>
                <li class="list-group-item">
                    <select class="form-control js-example-basic-multiple" name="product_catagory[]"
                        id="product_catagory" multiple>

                        @if(isset($catagory))

                        @foreach($catagory as $cat)

                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                        @endforeach
                        @endif

                        @if(@$eCatagory)
                        @foreach(@$eCatagory as $ecat)
                        <option value="{{$ecat->id}}">{{$ecat->title}}</option>
                        @endforeach
                        @endif
                    </select>
                </li>
                <li class="list-group-item">
                    <button type="submit" class="btn btn-primary" id="submit_product">Add
                        Product</button>
                </li>
            </ul>

        </div>
        <div class="col-md-9 order-md-1">

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="firstName">Title</label>
                    <input name="title" type="text" class="form-control" id="firstName">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="firstName">Discription</label>
                    <textarea class="form-control" name="discription" id="editor" cols="30" rows="10">
                    </textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username">Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="priceOfProduct" type="text" class="form-control" id="username"
                            placeholder="Username">
                        <div class="invalid-feedback" style="width: 100%;">
                            Price is required
                        </div>
                    </div>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="username">Discount</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input name="discountOfProduct" type="text" class="form-control" id="discount"
                            placeholder="Discount">
                        <div class="invalid-feedback" style="width: 100%;">
                            Discount Price is Required
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@section('admin_script')
<script type="text/javascript">
    $(function () {

        $('#thumbnail').on('change', function () {
            var file = $(this).get(0).files;
            var reader = new FileReader();
            reader.readAsDataURL(file[0]);
            reader.addEventListener("load", function (e) {
                var image = e.target.result;
                $("#imgthumbnail").attr('src', image);
            });
        });

        $('#product_catagory').select2();
    });

</script>

<script type="text/javascript">
    $(function () {
        ClassicEditor.create(document.querySelector('#editor'), {
            toolbar: ['Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote',
                'undo', 'redo'
            ],
        }).then(editor => {
            console.log(editor);
        }).catch(error => {
            console.error(error);
        });

    })

</script>
@endsection

@endsection
