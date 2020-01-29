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
      <th scope="col">Title</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($catagory))
  	@foreach($catagory as $cat)
    <tr>
      <th scope="row">{{@$cat->id}}</th>
      <td>{{@$cat->title}}</td>
      <td>{{@$cat->created_at}}</td>
      <td>
      	<a class="btn btn-primary" href ="{{route('admin.catagory.edit', @$cat->id)}}">Edit</a>
        <a class="btn btn-warning" href="{{route('admin.catagory.trash' , @$cat->id)}}">Trash</a>
      	<a class="btn btn-danger" href = "javascript:;" onclick="confirmDelete('{{$cat->id}}')">Delete</a>

        <form id ='delete-category-{{$cat->id}}' action="{{route('admin.catagory.destroy', $cat->id)}}" method='POST'>
          @method('DELETE')
          @csrf
        </form>
      </td>
    </tr>
    
    @endforeach
    @endif
    @if(isset($Trashed))
      @foreach($Trashed as $trash)
      <tr>

      <th scope="row">{{$trash->id}}</th>
      <td>{{$trash->title}}</td>
      <td>{{$trash->deleted_at}}</td>
      <td>
        <a class="btn btn-info" href="{{route('admin.catagory.recovery', $trash->id)}}">Restore</a>
      	<a class='btn btn-danger' href="javascript:;" onclick="confirmDelete('{{$trash->id}}')" >Delete</a>

        <form id ='delete-category-{{$trash->id}}' action="{{route('admin.catagory.destroy', $trash->id)}}" method='POST'>
          @method('DELETE')
          @csrf
        </form>
      </td>
    </tr>
      @endforeach
    @endif
  </tbody>
</table>


@endsection

@section('admin_script')
    <script>
    function confirmDelete(id){
      let choice = confirm('Do you wanna Delete this Item');
      if(choice)
      {
        document.getElementById('delete-category-'+id).submit();

      }
    }
    </script>
    @endsection