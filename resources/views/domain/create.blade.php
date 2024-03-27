@extends('layout.template')

@section('title', 'Create')

@section('content')

<div class="container tabela">
    <div class="container text-center">
        <div class="opcoes">
            Domain Add
        <div>   

        <form method= "post" action="{{ route('domain.store')}}" >
            @csrf
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
                                <option selected> -- Select Publisher -- </option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}"> {{ $publisher->name}} </option> 
                            @endforeach                         
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="ravshare" class="col dado">Ravshare:</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{ $domain->ravshare ?? old('ravshare')}}" max="100" name="ravshare" class="form-control " placeholder="Ravshare">
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
            </div>
            <a class="btn btn-primary" href="{{route('domain.index')}}" role="button">Return</a>
            <button type="submit" class="btn btn-success" >Create</button>
        </form>
    </div>
</div>


@endsection

     