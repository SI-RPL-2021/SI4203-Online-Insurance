<nav class="shadow-sm navbar w-100 fixed-top navbar-expand-lg navbar-light bg-light px-md-5" id="top-navbar">
  <div class="container">

    <a href="/" class="mb-0 font-weight-bold navbar-brand text-warning">
      <span class="fw-bold">
        LIFE
      </span>
      Insurance +
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="mb-2 navbar-nav me-auto mb-lg-0 font-weight-bold">
        <li class="nav-item">
          <a class="nav-link fw-bold" aria-current="page" href="{{ route('policy.home') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" aria-current="page" href="{{ route('claim.home') }}">Claim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" aria-current="page" href="#">Support</a>
        </li>
      </ul>
      <div>
        <!-- <a href="{{ route('dashboard.home') }}" class="px-4 btn btn-warning font-weight-bold">
          Dashboard
        </a> -->
        @if(Auth::check())
        <div class="dropdown">
          <button class="btn btn-light" type="button" data-bs-toggle="dropdown">
            <span class="mr-2 font-weight-bold">
              {{Auth::user()->name}}
            </span>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
            </svg>
          </button>
          <ul class="border-0 shadow dropdown-menu dropdown-menu-end w-100" aria-labelledby="dropdown">
            @if(Auth::user()->role === 'admin')
            <li>
              <a class="dropdown-item" href="{{route('dashboard.home')}}">Dashboard</a>
            </li>
            <li>
              @endif
              <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
            </li>

            <div class="dropdown-divider"></div>
            <li>
              <a class="dropdown-item text-danger" href="{{ route('auth.logout') }}">Logout</a>
            </li>
          </ul>
        </div>


        @else
        <div>

          <a href="{{ route('login') }}" class="px-4 btn d-inline-block btn-warning font-weight-bold">
            Login
          </a>
          <a href="{{ route('register') }}" class="px-4 btn d-inline-block d-inline btn-outline-warning font-weight-bold">
            Daftar
          </a>
        </div>
        @endif



      </div>
    </div>
  </div>
</nav>