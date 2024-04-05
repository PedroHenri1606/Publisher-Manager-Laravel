@extends('layout.template')

@section('title', 'Edit')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Publisher Edit
        </div>

        <form method= "post" action="{{ route('publisher.update', ['publisher' => $publisher->id]) }}" >
        @csrf
        @method('PUT')
            <div class="row mt-4">

                <div class="row mb-2">
                    <label for="name" class="col dado">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control " placeholder="Name">
                        {{ $errors->has('name') ? $errors->first('name') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control " placeholder="Email">
                        {{ $errors->has('email') ? $errors->first('email') : ''}}
                    </div>
                </div> 

                <div class="row mb-2">
                    <label for="nome" class="col dado">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" value="{{ $publisher->password ?? old('password')}}" name="password" class="form-control " placeholder="Password">
                        {{ $errors->has('password') ? $errors->first('password') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Document:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control " placeholder="Document">
                        {{ $errors->has('document') ? $errors->first('document') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Phone:</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control " placeholder="Phone">
                        {{ $errors->has('phone') ? $errors->first('phone') : ''}}
                    </div>
                </div>
            </div>
            
            <div class="mt-5">
                <a class="btn btn-outline-success" href="{{route('publisher.index')}}" role="button">Return</a>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection

     