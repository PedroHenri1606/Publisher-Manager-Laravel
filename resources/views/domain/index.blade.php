@extends('layout.template')

@section('title', 'Index')

@section('content')

  <div class="container tabela">
    <div class="container text-center">
    
      <div class="row align-items-start">
        <div class="col opcoes">
          Domains List
        </div>

        <div class="col mt-5">
          <a class="btn btn-success" href="{{route('domain.create')}}" role="button">Add Domain</a>
        </div>

      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">URI</th>
          <th scope="col">Publisher</th>
          <th scope="col">Ravshare</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          @foreach($domains as $domain)
              <tr>
                <td>{{ $domain->id }}</td>
                <td>{{ $domain->domain }}</td>
                <td>{{ $domain->publisher->name }}</td>
                <td>{{ $domain->ravshare }}%</td>
                  @if( $domain->status === 1)
                      <td> Active </td>
                  @else
                      <td> Disactive</td>
                  @endif
                <td>
                  <a class="btn btn-warning" href="{{ route('domain.edit', ['domain' => $domain])}}" role="button">Edit Publisher</a>
                  <a class="btn btn-success" href="{{ route('domain.show', ['domain' => $domain])}}" role="button">Details</a>
                </td>
                </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection