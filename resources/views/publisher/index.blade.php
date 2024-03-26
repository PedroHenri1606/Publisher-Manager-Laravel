@extends('layout.template')

@section('title', 'Home')

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
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($publishers as $publisher)
            <tr>
              <td>{{ $publisher->id }}</td>
              <td>{{ $publisher->name }}</td>
              <td>{{ $publisher->phone }}</td>
              <td>{{ $publisher->email }}</td>
              <td>{{ $publisher->document }}</td>
              <td>{{ $publisher->role->name }}</td>
              <td>{{ $publisher->status }}</td>
              <td>
                <a class="btn btn-warning" href="{{ route('publisher.edit', ['publisher' => $publisher])}}" role="button">Edit Publisher</a>
                <a class="btn btn-success" href="{{ route('publisher.show', ['publisher' => $publisher])}}" role="button">Details</a>
              </td>

              </tr>
        @endforeach
  </tbody>
</table>

@endsection