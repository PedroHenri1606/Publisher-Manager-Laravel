@extends('layout.template')

@section('title', 'Show')

@section('content')

<div class= "container tabela">
    <div class="container text-center">
        <div class="opcoes">
            Publisher Show
        </div>

        <form>
            <fieldset disabled>
                <div class="row">

                    <div class="row mb-2">
                        <label for="name" class="col dado">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control disable" placeholder="Name">
                        </div>
                    </div>

                   <div class="row mb-2">
                        <label for="nome" class="col dado">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control disable" placeholder="Email">
                        </div>
                    </div> 

                  <div class="row mb-2">
                        <label for="nome" class="col dado">Password:</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $publisher->password ?? old('password')}}" name="document" class="form-control disable" placeholder="Password">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col dado">Document:</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control disable" placeholder="Document">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col dado">Phone:</label>
                        <div class="col-sm-10">
                            <input type="number" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control disable" placeholder="Phone">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col dado">Status:</label>
                        <div class="col-sm-10">
                            <select class="form-select">
                                <option value="{{ $publisher->status}}"> 
                                    @if($publisher->status === 1)
                                        Active
                                    @else
                                        Disactive
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="nome" class="col dado">Role:</label>
                        <div class="col-sm-10">
                          <select class="form-select">
                            <option selected > {{ $publisher->role->name}} </option>                          
                          </select>
                        </div>
                    </div>
                </div>       
            </fieldset>
        </form>
    </div>
</div>

<div class="container text-center">
    <form id="form_{{$publisher->id}}" method="post" action ="{{ route('publisher.destroy', ['publisher' => $publisher->id]) }}"> 
        <tr>
            <td>
                <a class="btn btn-success" href="{{ route('publisher.index')}}" role="button">Return</a>
                @method('DELETE')
                @csrf
                <!-- <button type="submit"> Excluir </button> -->
                <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$publisher->id}}').submit()">Delete Publisher </a>
            </td>
        <tr>
    </form>
</div>

@endsection

     