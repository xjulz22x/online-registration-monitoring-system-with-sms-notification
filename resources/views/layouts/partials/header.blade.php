 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="index.html">
         ORMS
        </a>
        
        
        <a class="navbar-brand brand-logo-mini" href="index.html">
           <img src="{{asset('images/senior-logo.png')}}" alt="logo"/>
        </a>
       
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
    
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <span class="badge badge-success text-muted .text-uppercase">{{Auth::user()->first_name . ' ' . Auth::user()->last_name }} </span><i class="ti-settings"></i>
              {{-- <img src="{{asset('images/faces/face28.jpg')}}" alt="profile"/> --}}
            
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              @role('admin|staff')
              <a class="dropdown-item" href="{{route('show-profile')}}">
                <i class="ti-user text-primary"></i>
                Profile
              </a>
              @else
              <a class="dropdown-item" href="{{route('user-profile')}}">
                <i class="ti-settings text-primary"></i>
                Profile
              </a>
              @endrole
               <form method="POST" action="{{ route('logout') }}">
                @csrf
                   <a class="dropdown-item" href="route('logout')"
                         onclick="event.preventDefault();
                         this.closest('form').submit();">
                         <i class="ti-power-off text-primary"></i>
                        Logout
                   </a>
               </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>