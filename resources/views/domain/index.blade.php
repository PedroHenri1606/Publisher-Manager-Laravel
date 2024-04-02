@extends('layout.template')

@section('title', 'Index')

@section('content')

@include('layout._partials.navbar')


  <div class="container tabela">
    <div class="container text-center">
    
      <div class="row align-items-start g-2">
        <div class="col opcoes">
          @is('admin')
            List of all domains
          @endis
          @is('publisher')
            Your domains
          @endis
        </div>
        
        <div class="col-4 mt-4">
          <form method="POST" action="{{ route('domain.find')}}">
            @csrf
            <input type="text" class="col-4 findInput" name="id" placeholder="Informe o Id">
            <button class="col-4 btn btn-success " type="submit">Find</button>
          <form>
        </div>

        <div class="col mt-5">
          <a class="btn btn-success" href="{{route('domain.create')}}" role="button">Add Domain</a>
        </div>
  
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th class="col item">Id</th>
          <th class="col item">URI</th>
          @is('admin')
          <th class="col item">Publisher</th>
          @endis
          <th class="col item">Ravshare</th>
          <th class="col item">Status</th>
          <th class="col item">Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach($domains as $domain)
              <tr>
                <td>{{ $domain->id }}</td>
                <td>{{ $domain->domain }}</td>
                @is('admin')
                <td>{{ $domain->publisher->name }}</td>
                @endis
                <td>{{ $domain->ravshare }}%</td>
                  @if( $domain->status === 1)
                      <td> Active </td>
                  @else
                      <td> Disactive</td>
                  @endif
                <td>
                  <a class="btn btn-outline-success" href="{{ route('domain.edit', ['domain' => $domain])}}" role="button">Edit Domain</a>
                  <a class="btn btn-success" href="{{ route('domain.show', ['domain' => $domain])}}" role="button">Details</a>
                </td>
                </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection