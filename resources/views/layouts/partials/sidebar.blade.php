<nav class="sidebar sidebar-offcanvas" id="sidebar">
        @hasanyrole('admin|staff')
            <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin-dashboard')}}">
              <i class="ti-clipboard menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('senior-list')}}">
              <i class="ti-wheelchair menu-icon "></i>
              <span class="menu-title">Add Senior Citizens</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('completed-accounts')}}">
              <i class="ti-check menu-icon"></i>
              <span class="menu-title">Completed Accounts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('pending-accounts')}}">
              <i class="ti-close menu-icon"></i>
              <span class="menu-title">Pending Accounts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('declined-accounts')}}">
              <i class="ti-na menu-icon"></i>
              <span class="menu-title">Declined Accounts</span>
            </a>
          </li>
          
           <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-bookmark-alt menu-icon"></i>
              <span class="menu-title">Payouts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('payout-list')}}">Create Payout</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('payout-success')}}">List of Payouts</a></li>
              </ul>
            </div>
          </li>
          @role('admin')
              <li class="nav-item">
              <a class="nav-link" href="{{route('staff-list')}}">
                <i class="ti-face-smile menu-icon"></i>
                <span class="menu-title">Staff List</span>
              </a>
            </li>
          @else
            
          
          @endrole
        </ul>
        @else
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('user-dashboard')}}">
                <i class="ti-clipboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('my-payout-list')}}">
                <i class="ti-clipboard menu-icon"></i>
                <span class="menu-title">Payouts</span>
              </a>
            </li>
            @if (Auth::user()->preapplication == '')
              <li class="nav-item">
              <a class="nav-link" href="{{route('user-pre-application')}}">
                <i class="ti-agenda menu-icon"></i>
                <span class="menu-title">General Intake Sheet</span>
              </a>
            </li>
            @elseif (Auth::user()->identifying == '')
               <li class="nav-item">
              <a class="nav-link" href="{{route('create-identifying-information')}}">
                <i class="ti-info-alt menu-icon"></i>
                <span class="menu-title">Continue Registration</span>
              </a>
            </li>
             @elseif (Auth::user()->identifying == '')
               <li class="nav-item">
              <a class="nav-link" href="{{route('create-identifying-information')}}">
                <i class="ti-info-alt menu-icon"></i>
                <span class="menu-title">Continue Registration</span>
              </a>
            </li>
          
            @elseif (Auth::user()->family->count() == 0)
               <li class="nav-item">
              <a class="nav-link" href="{{route('create-family-composition')}}">
                <i class="ti-info-alt menu-icon"></i>
                <span class="menu-title">Continue Registration</span>
              </a>
            </li>
            @elseif (Auth::user()->economic == '')
               <li class="nav-item">
              <a class="nav-link" href="{{route('create-economic-status')}}">
                <i class="ti-info-alt menu-icon"></i>
                <span class="menu-title">Continue Registration</span>
              </a>
            </li>
            @elseif (Auth::user()->health == '')
               <li class="nav-item">
              <a class="nav-link" href="{{route('create-health-condition')}}">
                <i class="ti-info-alt menu-icon"></i>
                <span class="menu-title">Continue Registration</span>
              </a>
            </li>
            @endif
             
        </ul>
        @endhasanyrole
        
      </nav>
