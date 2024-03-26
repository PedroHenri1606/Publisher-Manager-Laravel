@extends('layout.template')

@section('title', 'Edit')

@section('content')

<form method= "post" action="{{ route('publisher.update', ['publisher' => $publisher->id]) }}" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control" placeholder="Name" aria-label="Name">
        </div>
        <div class="col">
            <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control" placeholder="Email" aria-label="Email">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control" placeholder="Document" aria-label="Document">
        </div>
        <div class="col">
            <input type="text" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control" placeholder="Phone" aria-label="Phone">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="text" value="{{ $publisher->status ?? old('status')}}" name="status" class="form-control" placeholder="Status" aria-label="Status">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="password" value="{{ $publisher->password ?? old('password')}}" name="password" class="form-control" placeholder="Password" aria-label="Password">
        </div>
    </div>

    <select name="role_id" class="form-control">
        <option>-- Select Role -- </option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ ($publisher->role_id ?? old('role_id')) == $role->id ? 'selected' : ''}}> {{ $role->name}} </option>
            @endforeach
    </select>
    
    <button type="submit" class="btn btn-warning" >Edit</button>
</form>


@endsection

     