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
          <th class="col item">
            <a class="item" href="{{route('user.orderById')}}" role="button">Id</a>
          </th>
          <th class="col item">
            <a class="item" href="{{route('user.orderByName')}}" role="button">Name</a>
          </th>
          <th class="col item">
            <a class="item" href="{{route('user.orderByEmail')}}" role="button">Email</a>
          </th>
          <th class="col item">
            <a class="item" href="{{route('user.orderByStatus')}}" role="button">Status</a>
          </th>
          <th class="col item">
            <a class="item" href="{{route('user.index')}}" role="button">Actions</a>
          </th>
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