<div class="container tabela border-light shadow text-center">
  <div class="container">
    <div class="row justify-content-center"> 
        
      <div class="col-auto col-md-7 opcoes">
        List of Publishers
      </div>

      <div class="col-auto align-self-center">
        <input type="text" class="findInput" wire:model="input" wire:input="find" placeholder="Id, name, phone, email or document">
      </div>

      <div class="col-auto col-2 align-self-center">
        <a class="btn btn-success" href="{{route('publisher.create')}}" role="button">Add Publisher</a>
      </div>
    </div>

    <table class="table mt-2 border-light shadow text-center mt-4">
      <thead>
        <tr>
          <th class="col">
            <a class="item" wire:click="orderBy('id')" role="button">Id</a>
          </th>
          <th class="col">
            <a class="item" wire:click="orderBy('id')" role="button">Name</a>
          </th>
          <th class="col">
            <a class="item" wire:click="orderBy('id')" role="button">Phone</a>
          </th>
          <th class="col">
            <a class="item" wire:click="orderBy('id')" role="button">Email</a>
          </th>
          <th class="col">
            <a class="item" wire:click="orderBy('id')" role="button">Document</a>
          </th>
          <th class="col">
            <a class="item" role="button">Actions</a>
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach($publishers as $publisher)
            <tr>
              <td>{{ $publisher->id }}</td>
              <td>{{ $publisher->name }}</td>
              <td>{{ $publisher->phone }}</td>
              <td>{{ $publisher->email }}</td>
              <td>{{ $publisher->document }}</td>
              <td>
                <a class="btn btn-outline-success" href="{{ route('publisher.edit', ['publisher' => $publisher])}}" role="button">Edit Publisher</a>
                <a class="btn btn-success" href="{{ route('publisher.show', ['publisher' => $publisher])}}" role="button">Details</a>
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>