@extends('layout.template')

@section('title', 'Show')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Publisher Show
        </div>

        <form>
            <fieldset disabled>
                <div class="row mt-4">

                    <div class="row mb-2">
                        <label for="name" class="col-2 dado">Name:</label>
                        <div class="col">
                            <input type="text" value="{{ $publisher->name ?? old('name')}}" name="name" class="form-control disable" placeholder="Name">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Email:</label>
                        <div class="col">
                            <input type="email" value="{{ $publisher->email ?? old('email')}}" name="email" class="form-control disable" placeholder="Email">
                        </div>
                    </div> 

                    <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Document:</label>
                        <div class="col">
                            <input type="text" value="{{ $publisher->document ?? old('document')}}" name="document" class="form-control disable" placeholder="Document">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Phone:</label>
                        <div class="col">
                            <input type="number" value="{{ $publisher->phone ?? old('phone')}}" name="phone" class="form-control disable" placeholder="Phone">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Status:</label>
                        <div class="col">
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

        <div class="border-light shadow text-center">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col">
                            <a class="item" href="" role="button">Id</a>
                        </th>

                        <th class="col">
                            <a class="item" href="" role="button">URI</a>
                        </th>


                        <th class="col">
                            <a class="item" href="" role="button">Revshare</a>
                        </th>

                        <th class="col">
                            <a class="item" href="" role="button">Status</a>
                        </th>
                        
                        <th class="col">
                            <a class="item" href="" role="button">Actions</a>
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
                            <td class="active"> Active </td>
                        @else
                            <td class="disactive"> Disactive</td>
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

        <div class="container text-center mt-4">
            <form id="form_{{$publisher->id}}" method="post" action ="{{ route('publisher.destroy', ['publisher' => $publisher->id]) }}"> 
                <tr>
                    <td>
                        <a class="btn btn-outline-success mb-2" href="{{ route('publisher.index')}}" role="button">Return</a>
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-success mb-2" href="#" onclick="document.getElementById('form_{{$publisher->id}}').submit()">Delete Publisher </a>
                    </td>
                <tr>
            </form>
        </div>
        
    </div>
</div>  

@endsection

     