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
		<div class="col-md-4 order-md-2 mb-4">
			<h4 class="d-flex justify-content-between align-items-center mb-3">
			
		</div>
		<div class="col-md-8 order-md-1">
			<h4 class="mb-3">Add Catagory</h4>
			<form class="needs-validation" novalidate>
				<div class="row">
					<div class="col-md-12  col-lg-12 mb-3">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="firstName" placeholder="" value="" required>
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
				
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
			</form>
		</div>
	</div>
</div>
@section('admin_script')
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
@endsection
@endsection