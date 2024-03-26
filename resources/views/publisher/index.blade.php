@extends('layout.template')

@section('titulo', 'Home')

@section('content')

<a class="btn btn-success" href="{{route('publisher.create')}}" role="button">Add Publisher</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Document</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td><a class="btn btn-warning" href="{{route('publisher.edit')}}" role="button">Edit Publisher</a></td>
    </tr>
  </tbody>
</table>

@endsection