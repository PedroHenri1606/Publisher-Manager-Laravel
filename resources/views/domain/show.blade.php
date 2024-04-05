@extends('layout.template')

@section('title', 'Show')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Domain Show
        </div>

        <form>
            <fieldset disabled>
                <div class="row mt-4">

                    <div class="row mb-2">
                        <label for="name" class="col-2 dado">Domain:</label>
                        <div class="col">
                            <input type="text" value="{{ $domain->domain ?? old('name')}}" name="domain" class="form-control " placeholder="Domain">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="publisher_id" class="col-2 dado">Publisher:</label>
                        <div class="col">
                            <select class="form-select" name="publisher_id">
                                <option> {{ $domain->publisher->name}} </option>                        
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label for="name" class="col-2 dado">Revshare:</label>
                        <div class="col">
                            <input type="text" value="{{ $domain->revshare ?? old('revshare')}}" name="revshare" class="form-control " placeholder="Revshare">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col-2 dado">Status:</label>
                        <div class="col">
                            <select class="form-select">
                                <option value="{{ $domain->status}}"> 
                                    @if($domain->status === 1)
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


    <div class="container text-center mt-5">
        <form id="form_{{$domain->id}}" method="post" action ="{{ route('domain.destroy', ['domain' => $domain->id]) }}"> 
            <tr>
                <td>
                    <a class="btn btn-outline-success" href="{{ route('domain.index')}}" role="button">Return</a>
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-success" href="#" onclick="document.getElementById('form_{{$domain->id}}').submit()">Delete Domain </a>
                </td>
            <tr>
        </form>
    </div>
</div>

@endsection

     