<div class="container tabela border-light shadow text-center">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-auto col-md-7 opcoes">
        @is('admin')
          Select a Domain
        @else
          Select Your Domain
        @endis
      </div>

      <div class="col-auto align-self-center">
        <input type="text" class="findInput" wire:model="input" wire:input="find" placeholder="Id or URI domain">
      </div>
    
    </div>

    <table class="table mt-2 border-light shadow text-center mt-4">
      <thead>
        <tr>
          <th class="col">
            <a class="item" wire:click="orderBy('id')" role="button">Id</a>
          </th>

          <th class="col">
            <a class="item" wire:click="orderBy('domain')" role="button">URI</a>
          </th>

          @is('admin')
          <th class="col">
            <a class="item" wire:click="orderBy('publisher_id')" role="button">Publisher</a>
          </th>
          @endis

          <th class="col">
            <a class="item" wire:click="orderBy('revshare')" role="button">Revshare</a>
          </th>

          <th class="col">
            <a class="item" wire:click="orderByStatus" role="button">Status</a>
          </th>
          
          <th class="col">
            <a class="item"  role="button">Actions</a>
          </th>
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
                <td>{{ $domain->revshare }}%</td>
                  @if( $domain->status === 1)
                      <td class="active"> Active </td>
                  @else
                      <td class="disactive"> Disactive</td>
                  @endif
                <td>
                  <a class="btn btn-outline-success" href="{{ route('reports.show', ['domain' => $domain])}}" role="button">Details</a>
                  <a class="btn btn-outline-success" href="{{ route('reports.create', ['domain' => $domain])}}" role="button">Create Log</a>
                  <a class="btn btn-success" href="{{ route('reports.historic', ['domain' => $domain->id])}}" role="button">View Historic</a>
                </td>
                </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>