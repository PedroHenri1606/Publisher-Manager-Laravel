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
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control " placeholder="Email">
                    </div>
                </div> 

                <div class="row mb-2">
                    <label for="nome" class="col dado">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" value="{{ $publisher->password ?? old('password')}}" name="password" class="form-control " placeholder="Password">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Document:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control " placeholder="Document">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Phone:</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control " placeholder="Phone">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Status:</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="status">
                            <option> -- Select Status -- </option>
                            <option value="1"> Active </option>
                            <option value="2"> Disable </option>  
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="nome" class="col dado">Role:</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="role_id">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" > {{ $role->name}} </option> 
                            @endforeach                         
                        </select>
                    </div>
                </div>

            </div>       
            <a class="btn btn-primary" href="{{route('publisher.index')}}" role="button">Return</a>
            <button type="submit" class="btn btn-success" >Create</button>
        </form>
    </div>
</div>


@endsection

     