@extends('layout.template')

@section('title', 'Home')

@section('content')

@include('layout._partials.navbar')


  <div class="container tabela">
    <div class="container text-center">
    
      <div class="row align-items-start">
        <div class="col opcoes">
          Publishers List
        </div>

        <div class="col-4 mt-4">
          <form method="POST" action="{{ route('publisher.find')}}">
            @csrf
            <input type="text" class="col-4 findInput" name="id" placeholder="Informe o Id">
            <button class="col-4 btn btn-success " type="submit">Find</button>
          <form>
        </div>

        <div class="col mt-5">
          <a class="btn btn-success" href="{{route('publisher.create')}}" role="button">Add Publisher</a>
        </div>
        
      </div>
    </div>


    <table class="table">
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
  </div>
</div>

@endsection