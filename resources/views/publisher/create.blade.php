@extends('layout.template')

@section('title', 'Create')

@section('content')

<div class= "container tabela">
    <div class="container text-center">
        <div class="opcoes">
            Publisher Add
        </div>

        <form method="post" action="{{ route('publisher.store')}}">
            @csrf
            <div class="row" >

                <div class="row mb-2">
                    <label for="name" class="col dado">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control " placeholder="Name">
                        {{ $errors->has('name') ? $errors->first('name') : ''}}  
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="email" class="col dado">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control " placeholder="Email">
                        {{ $errors->has('email') ? $errors->first('email') : ''}}
                    </div>
                </div> 

                <div class="row mb-2">
                    <label for="password" class="col dado">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" value="{{ $publisher->password ?? old('password')}}" name="password" class="form-control " placeholder="Password">
                        {{ $errors->has('password') ? $errors->first('password') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="document" class="col dado">Document:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control " placeholder="Document">
                        {{ $errors->has('document') ? $errors->first('document') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="phone" class="col dado">Phone:</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control " placeholder="Phone">
                        {{ $errors->has('phone') ? $errors->first('phone') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="status" class="col dado">Status:</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="status">
                            <option> -- Select Status -- </option>
                            <option value="1"> Active </option>
                            <option value="2"> Disable </option>  
                        </select>
                        {{ $errors->has('status') ? $errors->first('status') : ''}}
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="role_id" class="col dado">Role:</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="role_id">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" > {{ $role->name}} </option> 
                            @endforeach                         
                        </select>
                        {{ $errors->has('role_id') ? $errors->first('role_id') : ''}}
                    </div>
                </div>
            </div>       
            <a class="btn btn-primary" href="{{route('publisher.index')}}" role="button">Return</a>
            <button type="submit" class="btn btn-success" >Create</button>
        </form>
    </div>
</div>


@endsection

     