@extends('layout.template')

@section('title', 'Create')

@section('content')

<div class= "container tabela border-light shadow text-center">
    <div class="container">
        <div class="opcoes">
            Report Add Data
        </div>

        <form method="post" action="{{ route('reports.store')}}">
            @csrf
            <div class="row mt-4">

                <div class="row mb-2">
                    <label for="name" class="col-2 dado">Domain:</label>
                    <div class="col">
                        <input type="text" value="{{ $domain->domain}}" name="domain" class="form-control" readonly> 
                    </div>
                </div>
              
                <div class="row mb-2">
                    <label for="email" class="col-2 dado">Impressions:</label>
                    <div class="col">
                        <input type="number" value="{{ $revenueDomain->impressions ?? old('impressions')}}" name="impressions" class="form-control" placeholder="Impressions">
                        {{ $errors->has('impressions') ? $errors->first('impressions') : ''}}
                    </div>
                </div> 

                <div class="row mb-2">
                    <label for="password" class="col-2 dado">Revenue:</label>
                    <div class="col">
                        <input type="number" value="{{ $revenueDomain->revenue ?? old('revenue')}}" name="revenue" class="form-control " placeholder="Revenue">
                        {{ $errors->has('revenue') ? $errors->first('revenue') : ''}}
                    </div>
                </div>
            </div>  

            <div class="mt-5">  
                <a class="btn btn-outline-success" href="{{route('reports.index')}}" role="button">Return</a>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>

    </div>
</div>

@endsection