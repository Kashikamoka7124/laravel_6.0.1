@extends('admin.app')
@section('content')
@section('admin_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
@endsection
@section('title')
<h1 class="h2">Catagory</h1>
@endsection
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $err)
					    <li>{{$err}}</li>
					    @endforeach
					</ul>
					
				</div>
			@endif

		@if(session()->has('message'))
			<div class="alert alert-success">
				{{session('message')}}
				
			</div>
		@endif
		</div>
		<div class="col-md-12 order-md-1">
			<h4 class="mb-3">Add Catagory</h4>
			<form class="needs-validation " method="post" action="{{route('admin.catagory.store')}}" novalidate>
			@csrf

				<div class="row">
					<div class="col-md-12  col-lg-12 mb-3">
						<label for="title">Title</label>
						<input type="title" name="title" class="form-control" id="txturl" placeholder="" value="" required>
						<p class="small" >{{config('app.url')}}- <span id="slug_url"></span></p>
						<input type="hidden" id="app_url" name="slug">
						<div class="invalid-feedback">
							Valid Title is required.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12  col-lg-12 mb-3">
						<label class="form-control-label">Description: </label>
						<textarea name="description" id="editor" class="form-control " rows="10" cols="80">
						{!! @$category->description !!}</textarea>
						<div class="invalid-feedback">
							Valid Title is required.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12  col-lg-12 mb-3">
						<label class="form-control-label">Select Category: </label>
						<select class=" form-control js-example-basic-multiple" id="stylo" name="parent_id[]" multiple="multiple">					
							<option value="0">chashman Chaudhary</option>
							@if(isset($catagory)){

							@foreach($catagory as $cat)
							<option value="{{$cat->id}}">{{$cat->title}}</option>}
							option
							@endforeach
							})
							@endif
							option
						</select>
					</div>
				</div>
				
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
			</form>
		</div>
	</div>
</div>
@section('admin_script')
<script type="text/javascript" src="{{Config::get('app.url')}}/node_modules/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(function(){
	ClassicEditor.create( document.querySelector( '#editor' ), {
		toolbar: [ 'Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote','undo', 'redo' ],
	}).then( editor => {
		console.log( editor );
	}).catch( error => {
		console.error( error );
	});
	
})
</script>
<script type="text/javascript">
	$(function(){
		$('#stylo').select2();
	})

	$(function(){
		$('#txturl').on('keyup',function(){
			let url = slugify($(this).val());
			$('#slug_url').html(url);
			$('#app_url').val(url);
		})
	})
</script>
@endsection
@endsection