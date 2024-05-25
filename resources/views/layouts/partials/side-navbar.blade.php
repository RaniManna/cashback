<div class="sidebar sidebar-style-2" data-background-color="#fff">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">

        <img src="/public/img/image.png" alt="logo" class="avatar-img rounded">

          <!-- <img src="/img/propics/user.png" alt="..." class="avatar-img rounded"> -->
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>

              <span class="user-level">{{Auth::user()->first_name}}</span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="{{route('admin.editProfile')}}">
                  <span class="link-collapse">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="{{route('admin.changePass')}}">
                  <span class="link-collapse">Change Password</span>
                </a>
              </li>
              <li>
                <a href="{{route('admin.logout')}}">
                  <span class="link-collapse">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav nav-primary">
        <li class="nav-item
         @if(request()->path() == 'Dashboard') active
        @endif">
          <a href="{{route('admin.dashboard')}}">
            <i class="la flaticon-paint-palette"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Categories</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('companies.index') }}" class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Companies</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('branches.index') }}" class="nav-link {{ Request::is('branches*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Branches</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Users</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admins.index') }}" class="nav-link {{ Request::is('admins*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Admins</p>
            </a>
        </li>

        {{-- <li class="nav-item
         @if(request()->path() == 'userDashboard/reports') active
        @endif">
          <a href="{{route('user.reports')}}">
            <i class="icon-note"></i>
            <p>Quick-reports</p>
          </a>
        </li>
        <li class="nav-item
       @if(request()->path() == 'userDashboard/reports/add') active
        @endif">
          <a href="{{route('user.reports.add')}}">
          <i class="icon-plus"></i>
            <p>Add Report</p>
          </a>
        </li> --}}

      </ul>
    </div>
  </div>
</div>
