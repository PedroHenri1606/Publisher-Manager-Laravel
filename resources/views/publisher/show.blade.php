@extends('layout.template')

@section('title', 'Edit')

@section('content')

<form>
    <fieldset disabled>
        <div class="row">
            <div class="col" >
                <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control disable" placeholder="Name" aria-label="Name">
            </div>
            <div class="col">
                <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control" placeholder="Email" aria-label="Email">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control" placeholder="Document" aria-label="Document">
            </div>
            <div class="col">
                <input type="text" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control" placeholder="Phone" aria-label="Phone">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" value="{{ $publisher->status ?? old('status')}}" name="status" class="form-control" placeholder="Status" aria-label="Status">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="password" value="{{ $publisher->password ?? old('password')}}" name="password" class="form-control" placeholder="Password" aria-label="Password">
            </div>
        </div>

        <select class="form-control" name="role_id">
            <option selected > {{ $publisher->role->name}} </option>
        </select>
    </fieldset>
</form>


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

@endsection

     