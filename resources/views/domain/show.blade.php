@extends('layout.template')

@section('title', 'Show')

@section('content')

<form>
    <fieldset disabled>
        <div class="row">

        <div class="mb-3">
            <div class="col">
                <input type="text" value="{{ $domain->domain ?? old('domain')}}" name="domain" class="form-control" placeholder="Enter the website uri here">
            </div>

            <select name="publisher_id" class="form-control">
                <option selected> {{ $domain->publisher->name}} </option>
            </select>

            <div class="row">
                <select name="status" class="form-control">
                    <option value="{{ $domain->status}}" {{ ($domain->status ?? old('status'))}}> 
                        @if ($domain->status === 1)
                            Active
                        @else 
                            Disactive
                        @endif
                    </option>
                </select>
            </div>
        </div>
    </fieldset>
</form>

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

@endsection

     