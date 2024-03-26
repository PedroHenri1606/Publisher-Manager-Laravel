@extends('layout.template')

@section('title', 'Edit')

@section('content')

<form method= "post" action="{{ route('domain.update', ['domain' => $domain->id])}}" >
    @csrf
    @method('PUT')
    <div class="row">

    <div class="mb-3">
        <div class="col">
            <input type="text" value="{{ $domain->domain ?? old('domain')}}" name="domain" class="form-control" placeholder="Enter the website uri here">
        </div>

        <select name="publisher_id" class="form-control">
            <option>-- Select Publisher -- </option>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ ($domain->publisher_id ?? old('publisher_id')) == $publisher->id ? 'selected' : ''}}> {{ $publisher->name}} </option>
                @endforeach
        </select>

        <div class="row">
            <select name="status" class="form-control">
                <option value="{{ $domain->status}}" {{ ($domain->status ?? old('status'))}}> 
                    @if ($domain->status == 1)
                        Active
                    @else 
                        Disactive
                    @endif
                </option>
                <option>-- Select Status -- </option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-success" >Edit</button>
</form>


@endsection

     