@extends('layout.template')

@section('title', 'Show')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            User Show
        </div>

        <form>
            <fieldset disabled>
                <div class="row mt-4">

                    <div class="row mb-2">
                        <label for="name" class="col-2 dado">Name:</label>
                        <div class="col">
                            <input type="text" value="{{ $user->name ?? old('name')}}" name="name" class="form-control disable" placeholder="Name">
                        </div>
                    </div>

                   <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Email:</label>
                        <div class="col">
                            <input type="email" value="{{ $user->email ?? old('email')}}" name="email" class="form-control disable" placeholder="Email">
                        </div>
                    </div> 

                    <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Status:</label>
                        <div class="col">
                            <select class="form-select">
                                <option value="{{ $user->status}}"> 
                                    @if($user->status === 1)
                                        Active
                                    @else
                                        Disactive
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <div class="mt-5">
        <form id="form_{{$user->id}}" method="post" action ="{{ route('user.destroy', ['user' => $user->id]) }}"> 
            <tr>
                <td>
                    <a class="btn btn-outline-success" href="{{ route('user.index')}}" role="button">Return</a>
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-success" href="#" onclick="document.getElementById('form_{{$user->id}}').submit()">Delete User </a>
                </td>
            <tr>
        </form>
    </div>
</div>

@endsection

     