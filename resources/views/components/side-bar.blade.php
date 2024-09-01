<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
   
    <div class="app-brand demo">
      
        <a href="/dashboard" class="app-brand-link">
            <span class="app-brand-logo demo">
                <center>
              </center>
            </span>
          
            <span class="app-brand-text demo menu-text fw-bolder ms-1">Sk Showroom</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle  text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" >
        <!-- Dashboard -->
        @if(Auth::check() && Auth::user()->role_id == 1)
        <li class="menu-item {{ Request::path() == 'admin/dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::path() == 'admin/users/create' ? 'active' : '' }}">
            <a href="{{ route('admin.users.create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="Analytics">Create User</div>
            </a>
        </li>
        @elseif (Auth::check() && Auth::user()->role_id == 2)
        <li class="menu-item {{ Request::path() == 'location_admin/dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
       
        @else
        <li class="menu-item {{ Request::path() == 'employee/dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
       
        @endif
           
    </ul>
</aside>
<style>
  .badge {
      display: inline-block;
      padding: .25em .4em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: .29rem;
  }
  .badge-danger {
      color: #fff;
      background-color: rgb(253, 79, 79);
  }
</style>
