@extends('layout.template')

@section('title', 'Show')

@section('content')

<div class= "container tabela">
    <div class="container text-center">
        <div class="opcoes">
            Domain Show
        </div>

        <form>
            <fieldset disabled>

                <div class="row">
                    <div class="row mb-2">
                            <label for="name" class="col dado">Domain:</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $domain->domain ?? old('name')}}" name="domain" class="form-control " placeholder="Domain">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="publisher_id" class="col dado">Publisher:</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="publisher_id">
                                <option> {{ $domain->publisher->name}} </option>                        
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="nome" class="col dado">Status:</label>
                        <div class="col-sm-10">
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


    <form id="form_{{$domain->id}}" method="post" action ="{{ route('domain.destroy', ['domain' => $domain->id]) }}"> 
        <tr>
            <td>
                <a class="btn btn-success" href="{{ route('domain.index')}}" role="button">Return</a>
                @method('DELETE')
                @csrf
                <!-- <button type="submit"> Excluir </button> -->
                <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$domain->id}}').submit()">Delete Domain </a>
            </td>
        <tr>
    </form>
</div>

@endsection

     