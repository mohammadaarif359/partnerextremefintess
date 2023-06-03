<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Xtreamfitness</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user() ? Auth::user()->name : '' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  @if(Auth::user()->hasRole('superadmin'))
		  <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link @if(route('admin.dashboard') == URL::current()) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{ route('admin.partner') }}" class="nav-link @if(route('admin.partner') == URL::current()) active @endif">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Partners
              </p>
            </a>
          </li>
		  @endif
		  @if(Auth::user()->hasRole('gym-partner'))
		  <li class="nav-item">
            <a href="{{ route('admin.partner.dashboard') }}" class="nav-link @if(route('admin.partner.dashboard') == URL::current()) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{ route('admin.gym-member') }}" class="nav-link @if(route('admin.gym-member') == URL::current()) active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Gym Member
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="{{ route('admin.gym-plan') }}" class="nav-link @if(route('admin.gym-plan') == URL::current()) active @endif">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Gym Plan
              </p>
            </a>
          </li>
		  @endif
          <!--<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>
