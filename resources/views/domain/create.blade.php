@extends('layout.template')

@section('title', 'Create')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Domain Add
        </div>

        <form method="post" action="{{ route('domain.store')}}">
            @csrf
            <div class="row mt-4">
            
                <div class="row mb-2">
                    <label for="name" class="col-2 dado">Domain:</label>
                    <div class="col">
                        <input type="text" value="{{ $domain->domain ?? old('name')}}" name="domain" class="form-control " placeholder="Domain">
                    </div>
                </div>

                @is('admin')
                <div class="row mb-2">
                    <label for="publisher_id" class="col-2 dado">Publisher:</label>
                    <div class="col">
                        <select class="form-select" name="publisher_id">
                                <option selected> -- Select Publisher -- </option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}"> {{ $publisher->name}} </option> 
                            @endforeach                         
                        </select>
                    </div>
                </div>
                @endis

                <div class="row mb-2">
                    <label for="revshare" class="col-2 dado">Revshare:</label>
                    <div class="col">
                        <input type="number" value="{{ $domain->revshare ?? old('revshare')}}" max="100" name="revshare" class="form-control " placeholder="Revshare">
                        {{ $errors->has('revshare') ? $errors->first('revshare') : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="status" class="col-2 dado">Status:</label>
                    <div class="col">
                        <select class="form-select" name="status">
                            <option> -- Select Status -- </option>
                            <option value="1"> Active </option>
                            <option value="2"> Disable </option>  
                        </select>
                        {{ $errors->has('status') ? $errors->first('status') : ''}}
                    </div>
                </div>
            </div>       
            <div class="mt-5">  
                <a class="btn btn-outline-success" href="{{route('domain.index')}}" role="button">Return</a>
                <button type="submit" class="btn btn-success" >Create</button>
            </div>
        </form>
    </div>
</div>

@endsection

     