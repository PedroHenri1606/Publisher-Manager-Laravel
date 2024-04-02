<nav class="navbar bg-body-tertiary bg-light">
    <div class="container-fluid">
      <a class="navbar-brand item-nav" href="{{route('logout')}}">Publisher Manager</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        Menu
      </button>
      
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
       
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            
            @is('admin')
            <li class="nav-item">
              <a class="item-nav " aria-current="page" href="{{route('publisher.index')}}">Publishers</a>
            </li>
            @endis
          
            @is('publisher')
            <li class="nav-item">
              <a class="item-nav" aria-current="page" href="{{route('domain.index')}}">Domains</a>
            </li>
            @endis

            @is('admin')
            <li class="nav-item">
              <a class="item-nav" aria-current="page" href="{{route('domain.index')}}">Domains</a>
            </li>
            @endis
            
            @is('admin')
              <li class="nav-item">
                <a class="item-nav" aria-current="page" href="{{route('user.index')}}">Users</a>
              </li>
            @endis

            @is(['publisher', 'admin'])
              <li class="nav-item">
                <a class="item-nav" aria-current="page" href="{{route('reports.index')}}">Reports</a>
              </li>
            @endis
          </ul>
        </div>
      </div>
    </div>
</nav>