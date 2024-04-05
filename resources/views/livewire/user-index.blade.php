<div class="container tabela border-light shadow text-center">
  <div class="container">
    <div class="row justify-content-end">     
    
      <div class="col-auto col-md-7 opcoes">
        List of Users
      </div>

      <div class="col-auto align-self-center">
        <input type="text" class="findInput" wire:model="input" wire:input="find" placeholder="Id, name or Email">
      </div>
      
      <div class="col-auto col-2 align-self-center">
        <a class="btn btn-success " href="{{route('user.create')}}" role="button">Add User</a>
      </div>
    </div>


    <table class="table mt-2 border-light shadow text-center mt-4">
      <thead>
        <tr>
          <th class="col item">
            <a class="item" wire:click="orderBy('id')" role="button">Id</a>
          </th>
          <th class="col item">
            <a class="item" wire:click="orderBy('name')" role="button">Name</a>
          </th>
          <th class="col item">
            <a class="item" wire:click="orderBy('email')" role="button">Email</a>
          </th>
          <th class="col item">
            <a class="item" wire:click="orderByStatus"  role="button">Status</a>
          </th>
          <th class="col item">
            <a class="item" role="button">Actions</a>
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
                @if( $user->status === 1)
                    <td class="active"> Active </td>
                @else
                    <td class="disactive"> Disactive</td>
                @endif
              <td>
                <a class="btn btn-outline-success" href="{{ route('user.edit', ['user' => $user])}}" role="button">Edit user</a>
                <a class="btn btn-success" href="{{ route('user.show', ['user' => $user])}}" role="button">Details</a>
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>