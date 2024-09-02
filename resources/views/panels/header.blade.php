 <header class="header" id="navbar">
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container">
        <a class="navbar-brand p-0" href="{{ route('home') }}">
          <img src="{{ url('assets1/imgs/logo.png') }}" alt="" class="img-fluid">
        </a>
        <div class="d-flex justify-content-end align-items-center ms-auto">
          <div class="collapse navbar-collapse" id="navbarheader">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  About
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> 
                  Support
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Blog
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  FAQs
                </a> 
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('front_login')}}">
                Login
                </a>

              </li>
            </ul>
          </div>
          <button class="menu-backdrop d-lg-none" data-bs-toggle="collapse" data-bs-target="#navbarheader"
            aria-controls="navbarheader" aria-expanded="false" aria-label="Toggle navigation"></button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarheader"
            aria-controls="navbarheader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="#" class="btn btn-default">
            Get Started
          </a>
        </div>
      </div>
    </nav>
  </header>