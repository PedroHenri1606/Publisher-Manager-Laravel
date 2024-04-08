<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <h2>Publisher Manager</h2>
            </div>
        </div>
        <ul class="sidebar-nav ">
            @is('admin')
            <li class="sidebar-item">
                <a href="{{route('user.index')}}" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Users</span>
                </a>
            </li>
            @endis
            <li class="sidebar-item">
                <a href="{{route('domain.index')}}" class="sidebar-link">
                    <i class="lni lni-website"></i>
                    <span>Domains</span>
                </a>
            </li>
            @is('admin')
            <li class="sidebar-item">
                <a href="{{route('publisher.index')}}" class="sidebar-link">
                    <i class="lni lni-play"></i>
                    <span>Publishers</span>
                </a>
            </li>
            @endis
            <li class="sidebar-item">
                <a href="{{route('reports.index')}}" class="sidebar-link">
                    <i class="lni lni-stats-up"></i>
                    <span>Reports</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer border-light shadow text-center">
            <a href="{{route('logout')}}" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    @yield('content') 
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous">
</script>
<script src="{{ asset('js/script.js')}}"></script>
