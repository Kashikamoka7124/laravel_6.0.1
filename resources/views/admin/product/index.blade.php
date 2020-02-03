@extends('admin.app')
@section('content')
@section('admin_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
@endsection
@section('title')
<h1 class="h2">Catagory</h1>

@endsection

      @if(session()->has('message'))
      <div class = 'alert alert-success'>

          {{session('message')}}
          
      </div >

      @endif

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

    <tbody>
    <tr>
    @foreach($sProduct as $pro)
    <td>{{$pro->id}}</td>
    <td> <img width = '35px' height ="50px" src="{{asset($pro->thumbnail)}}" alt="There is Image"></td>
    <td>{{$pro->title}}</td>
    <td>{{$pro->price}}</td>
    <td>{{$pro->created_at}}</td>
    <td>
        <a class ="btn btn-primary" href="{{route('admin.product.edit', $pro->id)}}">Edit</a>
        <a class="btn btn-info" href ="{{route('admin.product.edit', $pro->id)}}">Trash</a>
        <a class="btn btn-danger" href ="{{route('admin.product.edit', $pro->id)}}">Delete</a>
    </td>
    </tr>
    @endforeach

    </tbody>
</table>

@endsection