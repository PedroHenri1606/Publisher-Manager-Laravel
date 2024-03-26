@extends('layout.template')

@section('title', 'Create')

@section('content')

<form method= "post" action="{{ route('domain.store')}}" >
    @csrf
    <div class="row">

    <div class="mb-3">
        <div class="col">
            <input type="text" name="domain" class="form-control" placeholder="Enter the website uri here">
        </div>

        <select name="publisher_id" class="form-control">
            <option>-- Select Publisher -- </option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}"> {{ $publisher->name}} </option>
                @endforeach
        </select>

        <div class="row">
            <select name="status" class="form-control">
                <option>-- Select Status -- </option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-success" >Create</button>
</form>


@endsection

     