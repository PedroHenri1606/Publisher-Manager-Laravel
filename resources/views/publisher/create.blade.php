@extends('layout.template')

@section('title', 'Create')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Publisher Add
        </div>

        <form method="post" action="{{ route('publisher.store')}}">
            @csrf
            <div class="row mt-4">
            
                <div class="row mb-2">
                    <label for="name" class="col-2 dado">Name:</label>
                    <div class="col">
                        <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control " placeholder="Name">
                        {{ $errors->has('name') ? $errors->first('name') : ''}}  
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="email" class="col-2 dado">Email:</label>
                    <div class="col">
                        <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control " placeholder="Email">
                        {{ $errors->has('email') ? $errors->first('email') : ''}}
                    </div>
                </div> 

                <div class="row mb-2">
                    <label for="password" class="col-2 dado">Password:</label>
                    <div class="col">
                        <input type="password" value="{{ $publisher->password ?? old('password')}}" name="password" class="form-control " placeholder="Password">
                        {{ $errors->has('password') ? $errors->first('password') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="document" class="col-2 dado">Document:</label>
                    <div class="col">
                        <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control " placeholder="Document">
                        {{ $errors->has('document') ? $errors->first('document') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="phone" class="col-2 dado">Phone:</label>
                    <div class="col">
                        <input type="number" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control " placeholder="Phone">
                        {{ $errors->has('phone') ? $errors->first('phone') : ''}}
                    </div>
                </div>
            </div>
            <div class="mt-5">    
                <a class="btn btn-outline-success" href="{{route('publisher.index')}}" role="button">Return</a>
                <button type="submit" class="btn btn-success" >Create</button>
            </div>
        </form>
    </div>
</div>

@endsection

     