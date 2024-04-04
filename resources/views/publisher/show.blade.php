@extends('layout.template')

@section('title', 'Show')

@section('content')

@include('layout._partials.navbar')


<div class= "container  border-light shadow text-center">
    <div class="container">
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
                            <input type="password" value="{{ $publisher->password ?? old('password')}}" name="document" class="form-control disable" placeholder="Password">
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

                </div>
            </fieldset>
        </form>

        
            <div class="opcoes">
                Domains from this publisher
            </div>

            <div class="container  border-light shadow text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col">
                                <a class="item" href="{{route('domain.orderById')}}" role="button">Id</a>
                            </th>

                            <th class="col">
                                <a class="item" href="{{route('domain.orderByUri')}}" role="button">URI</a>
                            </th>


                            <th class="col">
                                <a class="item" href="{{route('domain.orderByRevshare')}}" role="button">Revshare</a>
                            </th>

                            <th class="col">
                                <a class="item" href="{{route('domain.orderByStatus')}}" role="button">Status</a>
                            </th>
                            
                            <th class="col">
                                <a class="item" href="{{route('domain.index')}}" role="button">Actions</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($domains as $domain)
                        <tr>
                            <td>{{ $domain->id }}</td>
                            <td>{{ $domain->domain }}</td>
                            <td>{{ $domain->revshare}}%</td>
                            @if( $domain->status === 1)
                                <td> Active </td>
                            @else
                                <td> Disactive</td>
                            @endif
                            <td>
                                <a class="btn btn-outline-success" href="{{ route('domain.edit', ['domain' => $domain])}}" role="button">Edit Publisher</a>
                                <a class="btn btn-success" href="{{ route('domain.show', ['domain' => $domain])}}" role="button">Details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

    <div class="container text-center">
        <form id="form_{{$publisher->id}}" method="post" action ="{{ route('publisher.destroy', ['publisher' => $publisher->id]) }}"> 
            <tr>
                <td>
                    <a class="btn btn-outline-success mb-4" href="{{ route('publisher.index')}}" role="button">Return</a>
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-success mb-4" href="#" onclick="document.getElementById('form_{{$publisher->id}}').submit()">Delete Publisher </a>
                </td>
            <tr>
        </form>
    </div>
</div>  

@endsection

     