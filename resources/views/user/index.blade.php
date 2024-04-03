@extends('layout.template')

@section('title', 'Home')

@section('content')

@include('layout._partials.navbar')

<div class="container tabela border-light shadow text-center">
  <div class="container">
    <form method="POST" action="{{route ('user.find')}}" class="row justify-content-end">     
      @csrf
      <div class="col-auto col-md-4 opcoes">
        User List
      </div>

      <div class="col-auto align-self-center">
      <input type="text" class="findInput" name="id" placeholder="Enter the ID">
      </div>
      
      <div class="col-auto align-self-center">
        <button class="btn btn-success " type="submit">Find</button>
      </div>

      <div class="col-auto col-md-2 align-self-center">
        <a class="btn btn-success" href="{{route('user.create')}}" role="button">Add User</a>
      </div>
    <form>


    <table class="table mt-2">
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
    {{ $users->onEachSide(0)->links()}}
  </div>
</div>

@endsection