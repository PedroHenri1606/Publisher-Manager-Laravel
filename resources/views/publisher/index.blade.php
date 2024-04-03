@extends('layout.template')

@section('title', 'Home')

@section('content')

@include('layout._partials.navbar')

<div class="container tabela border-light shadow text-center">
  <div class="container">
    <form method="POST" action="{{route ('publisher.find')}}" class="row justify-content-end">     
      @csrf
      <div class="col-auto col-md-4 opcoes">
        Publisher List
      </div>

      <div class="col-auto align-self-center">
      <input type="text" class="findInput" name="id" placeholder="Enter the ID">
      </div>
      
      <div class="col-auto align-self-center">
        <button class="btn btn-success " type="submit">Find</button>
      </div>

      <div class="col-auto col-md-2 align-self-center">
        <a class="btn btn-success" href="{{route('publisher.create')}}" role="button">Add Domain</a>
      </div>
    <form>

    <table class="table mt-2">
      <thead>
        <tr>
          <th class="col item">Id</th>
          <th class="col item">Name</th>
          <th class="col item">Phone</th>
          <th class="col item">Email</th>
          <th class="col item">Document</th>
          <th class="col item">Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($publishers as $publisher)
            <tr>
              <td>{{ $publisher->id }}</td>
              <td>{{ $publisher->name }}</td>
              <td>{{ $publisher->phone }}</td>
              <td>{{ $publisher->email }}</td>
              <td>{{ $publisher->document }}</td>
              <td>
                <a class="btn btn-outline-success" href="{{ route('publisher.edit', ['publisher' => $publisher])}}" role="button">Edit Publisher</a>
                <a class="btn btn-success" href="{{ route('publisher.show', ['publisher' => $publisher])}}" role="button">Details</a>
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
    {{ $publishers->onEachSide(0)->links()}}
  </div>
</div>

@endsection