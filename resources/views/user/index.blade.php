@extends('layout.template')

@section('title', 'Home')

@section('content')

@include('layout._partials.navbar')


  <div class="container tabela">
    <div class="container text-center">
    
      <div class="row align-items-start">
        <div class="col opcoes">
          User List
        </div>

        <div class="col mt-5">
          <a class="btn btn-success" href="{{route('user.create')}}" role="button">Add User</a>
        </div>
        
      </div>
    </div>


    <table class="table">
      <thead>
        <tr>
          <th class="col item">Id</th>
          <th class="col item">Name</th>
          <th class="col item">Email</th>
          <th class="col item">Status</th>
          <th class="col item">Actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
                @if( $user->status === 1)
                    <td> Active </td>
                @else
                    <td> Disactive</td>
                @endif
              <td>
                <a class="btn btn-outline-success" href="{{ route('user.edit', ['user' => $user])}}" role="button">Edit user</a>
                <a class="btn btn-success" href="{{ route('user.show', ['user' => $user])}}" role="button">Details</a>
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection