@extends('layout.template')

@section('title', 'Create')

@section('content')

<form action="{{ route('publisher.create')}}" method="post">
    @csrf
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Name" aria-label="Name">
        </div>
        <div class="col">
            <input type="email" class="form-control" placeholder="Email" aria-label="Email">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Document" aria-label="Document">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Phone" aria-label="Phone">
        </div>
    </div>

    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Status" aria-label="Status">
        </div>
    </div>
    
    <button type="submit" class="btn btn-success" >Create</button>
</form>


@endsection

     