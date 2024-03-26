@extends('layout.template')

@section('title', 'Create')

@section('content')

<form method= "post" action="{{ route('publisher.store')}}" >
    @csrf
    <div class="row">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name">
        </div>
        <div class="col">
            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="text" name="document" class="form-control" placeholder="Document" aria-label="Document">
        </div>
        <div class="col">
            <input type="text" name="phone" class="form-control" placeholder="Phone" aria-label="Phone">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="text" name="status" class="form-control" placeholder="Status" aria-label="Status">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
        </div>
    </div>

    <select name="role_id">
        <option>-- Select Role -- </option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}"> {{ $role->name}} </option>
            @endforeach
    </select>
    
    <button type="submit" class="btn btn-success" >Create</button>
</form>


@endsection

     