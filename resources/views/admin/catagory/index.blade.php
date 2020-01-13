@extends('admin.app')
@section('content')
@section('admin_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
@endsection
@section('title')
<h1 class="h2">Catagory</h1>
@endsection
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($catagory as $cat)
    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->title}}</td>
      <td>{{$cat->created_at}}</td>
      <td>
      	<a class="btn btn-primary" href ="{{route('admin.catagory.edit', $cat->id)}}">Edit</a>
      	<a class="btn btn-danger ">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection