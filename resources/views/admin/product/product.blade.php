@extends('admin.app')
@section('content')
@section('title')
<h2>Add Product</h2>
@endsection
<div class="row">
    <div class="col-md-3 order-md-2 mb-4">
        <ul class="list-group list-unstyled row">
            <li class="list-group-item active">
                <h5>Status</h5>
            </li>
            <li class="list-group-item">
                <select class="form-control" name="statusSelect" id="statusSelect">
                    <option value="0">Public</option>
                    <option value="1">Private</option>
                </select>

            </li>
            <li class="list-group-item active">
                <h5>Featured</h5>
            </li>
            <li class="list-group-item">

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="thumbnail" aria-describedby="productImage">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </li>
            <li class="img-thumbnail">
                <img src="@if(isset($product)) {{asset('storage/'.$product->thumbnail)}} @else {{asset('asset/image/noimage3.jpg')}} @endif"
                    id="imgthumbnail" class="img-fluid" alt="">
                <div class="input-group-prepend justify-content-center">
                    <span class="input-group-text">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked"></label>
                            Featured Images
                        </div>
                    </span>
                </div>
            </li>
            <li class ="list-group-item active">
                    <h5>Select Catagory</h5>
            </li>
            <li class ="list-group-item">
                    <select class="form-control js-example-basic-multiple"name="product_catagory[]" id="product_catagory" multiple></select>
            </li>
            <li class ="list-group-item">
                <button type="submit" class ="btn btn-primary" name ="submit_product" id ="submit_product">Add Product</button>
            </li>
        </ul>

    </div>
    <div class="col-md-9 order-md-1">
        <form class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>

    </div>
    <hr class="mb-4">
    </form>
</div>
</div>
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
@endsection

@endsection
