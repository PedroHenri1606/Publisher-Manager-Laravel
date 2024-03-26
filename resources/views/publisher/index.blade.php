@extends('layout.template')

@section('title', 'Home')

@section('content')

  <div class="container tabela">
    <div class="container text-center">
    
      <div class="row align-items-start">
        <div class="col opcoes">
          Publisher List
        </div>

        <div class="col mt-5">
          <a class="btn btn-success" href="{{route('publisher.create')}}" role="button">Add Publisher</a>
        </div>
        
      </div>
    </div>


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
        @foreach($publishers as $publisher)
            <tr>
              <td>{{ $publisher->id }}</td>
              <td>{{ $publisher->name }}</td>
              <td>{{ $publisher->phone }}</td>
              <td>{{ $publisher->email }}</td>
              <td>{{ $publisher->document }}</td>
              <td>{{ $publisher->role->name }}</td>
                @if( $publisher->status === 1)
                    <td class="col ativo"> Active </td>
                @else
                    <td class="col inativo"> Disactive</td>
                @endif
              <td>
                <a class="btn btn-warning" href="{{ route('publisher.edit', ['publisher' => $publisher])}}" role="button">Edit Publisher</a>
                <a class="btn btn-success" href="{{ route('publisher.show', ['publisher' => $publisher])}}" role="button">Details</a>
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection