@extends('layout.template')

@section('title', 'Edit')

@section('content')

@include('layout._partials.navbar')


<form method= "post" action="{{ route('user.update', ['user' => $user->id]) }}" >
    @csrf
    @method('PUT')

    <div class="container tabela">
        <div class="container text-center">

            <div class="row">

                <div class="row mb-2">
                    <label for="name" class="col dado">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $user->name ?? old('name')}}" name="name" class="form-control " placeholder="Name">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{ $user->email ?? old('email')}}" name="email" class="form-control " placeholder="Email">
                    </div>
                </div> 

                <div class="row mb-2">
                    <label for="nome" class="col dado">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" value="{{ $user->password ?? old('password')}}" name="password" class="form-control " placeholder="Password">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="nome" class="col dado">Status:</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="status">
                            <option value="{{$user->status}}"> 
                                @if ($user->status === 1)
                                    Active
                                @else 
                                    Disactive
                                @endif
                            </option>
                            <option> -- Select Status -- </option>
                            <option value="1"> Active </option>
                            <option value="2"> Disable </option>  
                        </select>
                    </div>
                </div>
            </div>

            <a class="btn btn-outline-success" href="{{route('user.index')}}" role="button">Return</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</form>


@endsection

     