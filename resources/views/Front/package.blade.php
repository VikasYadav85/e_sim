<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Register</title>
  <link rel="icon" type="image/x-icon" href="{{ url('public/assets/imgs/favicon.ico') }}">

  <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="http://174.138.3.35/esim/assets1/css/style.css" rel="stylesheet">

</head>

<body>
 
  @include('panels.header')
  {{--  <header class="header" id="navbar">
    <nav class="navbar navbar-expand-lg p-0">
      <div class="container">
        <a class="navbar-brand p-0" href="{{ route('home') }}">
          <img src="http://174.138.3.35/esim/assets1/imgs/logo.png" alt="" class="img-fluid">
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
                <a class="nav-link" href="{{ route('front_login') }}">
                  Log in
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
  </header>  --}}
  <section class="section-space">
    <div class="container position-relative">
      <div class="d-md-flex align-items-center">
        <a href="{{ url()->previous()}}">
        <button class="btn section-title-sm d-inline-flex align-items-center p-0">
          <img src="http://174.138.3.35/esim/assets1/imgs/back.png" alt="" class="me-2">
          Back
        </button>
        </a>

        <div class="col-md-9">
          <h1 class="section-title text-center">
            Select a Package
          </h1>

        </div>
      </div>
      <div class="mt-4">
        <h2 class="section-title-sm mb-0">{{ $packageCountry->title }}</h2>
        <div class="row">
          @foreach($packages as $package)
          <div class="col-12 col-lg-6">
            <div class="packages-box border">
              <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-xl-6">
                  <h3 class="section-title-sm darkprimary mb-0">
                    {{ $package->title }}
                  </h3>
                  <p class="details-text m-0 secondary-color">
                   {{ $package->short_info }}
                  </p>
                </div>
                <div class="col-12 col-md-auto col-xl-6">
                  <div class="d-flex flex-wrap align-items-center gap-2 justify-content-xl-end">
                    <p class="details-text mb-0 darkprimary-color">
                      Works In
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                      @foreach($package->packageCountry as $country)
                       <img src="{{$country->url}}" alt="">

                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-wrap align-items-start gap-4 mt-3">
                <div class="row col">
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Validity
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      {{ $package->day }} Days
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Data
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      {{ $package->data }} GB
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Price
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      ${{ $package->amount }}
                    </p>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <a href="{{ route('select-package', ['id'=> $package->id]) }}" class="btn btn-default w-100">
                    SHOP NOW
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {{--<div class="col-12 col-lg-6">
            <div class="packages-box border">
              <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-xl-6">
                  <h3 class="section-title-sm darkprimary mb-0">
                    Europe USA 10+2 GB FREE
                  </h3>
                  <p class="details-text m-0 secondary-color">
                    Nationwide eSIM data
                  </p>
                </div>
                <div class="col-12 col-md-auto col-xl-6">
                  <div class="d-flex flex-wrap align-items-center gap-2 justify-content-xl-end">
                    <p class="details-text mb-0 darkprimary-color">
                      Works In
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-2.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-3.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-2.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-wrap align-items-start gap-4 mt-3">
                <div class="row col">
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Validity
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      7 Days
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Data
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      1.5 GB
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Price
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      $13.99
                    </p>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#" class="btn btn-default w-100">
                    SHOP NOW
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="packages-box border">
              <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-xl-6">
                  <h3 class="section-title-sm darkprimary mb-0">
                    Europe USA 10+2 GB FREE
                  </h3>
                  <p class="details-text m-0 secondary-color">
                    Nationwide eSIM data
                  </p>
                </div>
                <div class="col-12 col-md-auto col-xl-6">
                  <div class="d-flex flex-wrap align-items-center gap-2 justify-content-xl-end">
                    <p class="details-text mb-0 darkprimary-color">
                      Works In
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-2.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-3.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-2.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-wrap align-items-start gap-4 mt-3">
                <div class="row col">
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Validity
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      7 Days
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Data
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      1.5 GB
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Price
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      $13.99
                    </p>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#" class="btn btn-default w-100">
                    SHOP NOW
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="packages-box border">
              <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-xl-6">
                  <h3 class="section-title-sm darkprimary mb-0">
                    Europe USA 10+2 GB FREE
                  </h3>
                  <p class="details-text m-0 secondary-color">
                    Nationwide eSIM data
                  </p>
                </div>
                <div class="col-12 col-md-auto col-xl-6">
                  <div class="d-flex flex-wrap align-items-center gap-2 justify-content-xl-end">
                    <p class="details-text mb-0 darkprimary-color">
                      Works In
                    </p>
                    <div class="d-flex gap-2 align-items-center">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-2.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-3.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-1.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-2.png" alt="">
                      <img src="http://174.138.3.35/esim/assets1/imgs/country-3.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-wrap align-items-start gap-4 mt-3">
                <div class="row col">
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Validity
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      7 Days
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Data
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      1.5 GB
                    </p>
                  </div>
                  <div class="col mw-1">
                    <div class="verical-devider"></div>
                  </div>
                  <div class="col">
                    <p class="details-text mb-0 ">
                      Price
                    </p>
                    <p class="details-text mb-0 darkprimary-color">
                      $13.99
                    </p>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#" class="btn btn-default w-100">
                    SHOP NOW
                  </a>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </section>


  {{--  <footer class="footer section-space pb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xl-3 col-xxl-4">
          <h6 class="fw-medium text-white mb-3 mb-lg-4">About Us</h6>
          <a href="">
            <img src="http://174.138.3.35/esim/assets1/imgs/ft-logo.png" alt="">
          </a>
          <p class="details-text text-white my-3">
            AxurSIM is a digital channel for telecom services, enabling
            consumers to find and buy the best eSIM offers in the world.
          </p>
          <div class="d-flex gap-3">
            <a href="">
              <img src="http://174.138.3.35/esim/assets1/imgs/facebook.png" alt="" class="social-ic">
            </a>
            <a href="">
              <img src="http://174.138.3.35/esim/assets1/imgs/twitter.png" alt="" class="social-ic">
            </a>
            <a href="">
              <img src="http://174.138.3.35/esim/assets1/imgs/insta.png" alt="" class="social-ic">
            </a>
          </div>
        </div>
        <div class="col-md-12 col-xl-9 col-xxl-8">
          <div class="row justify-content-xl-between">
            <div class="col-6 col-sm-4 col-lg-20 mt-4 mt-xl-0">
              <h6 class="fw-medium text-white mb-3 mb-lg-4">
                <u>Popular Regions</u>
              </h6>
              <div>
                <div class="ft-links">
                  <a href="">
                    United States
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Canada
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Mexico
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    United Kingdom
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    France
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Italy
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Spain
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Greece
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Europe
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Sun destinations
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-20 mt-4 mt-xl-0">
              <h6 class="fw-medium text-white mb-3 mb-lg-4">
                <u>About</u>
              </h6>
              <div>
                <div class="ft-links">
                  <a href="">
                    About eSIM
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Business travel
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Refer & Earn
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Be an affiliate
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Data calculator
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Device checker
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    eSIM installation
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    eSIM activation
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Calling & texting
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Roaming settings
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-20 mt-4 mt-xl-0">
              <h6 class="fw-medium text-white mb-3 mb-lg-4">
                <u>Countries</u>
              </h6>
              <div>
                <div class="ft-links">
                  <a href="">
                    Track order
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    My account
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    FAQ
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Locate us
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Lost SIM
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Claim refund
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Reclaim number
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Feedback
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Contact us
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-20 mt-4 mt-xl-0">
              <h6 class="fw-medium text-white mb-3 mb-lg-4">
                <u>Support</u>
              </h6>
              <div>
                <div class="ft-links">
                  <a href="">
                    Account Settings
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Manage eSIMs
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Billing & Pricing
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Troubleshooting
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-20 mt-4 mt-xl-0">
              <h6 class="fw-medium text-white mb-3 mb-lg-4">
                <u>More</u>
              </h6>
              <div>
                <div class="ft-links">
                  <a href="">
                    iOS app
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Android app
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Web store
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Blog
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Press
                  </a>
                </div>
                <div class="ft-links">
                  <a href="">
                    Log in
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright border-top mt-4 mt-md-5 pt-4 d-flex flex-wrap justify-content-between gap-3">
        <div>
          <div class="details-text text-white m-0 d-flex align-items-center flex-wrap">
            © 2024 eSIM <span class="px-3">|</span> All Rights Reserved <span class="px-3">|</span> <a href=""
              class="text-white">Policies</a> <span class="px-3">|</span> <a href="" class="text-white"> Terms &
              conditions </a>
          </div>
        </div>
        <div class="d-flex align-items-center gap-2">
          <img src="http://174.138.3.35/esim/assets1/imgs/apple-pay.png" alt="" class="paymentcard-img">
          <img src="http://174.138.3.35/esim/assets1/imgs/g-pay.png" alt="" class="paymentcard-img">
          <img src="http://174.138.3.35/esim/assets1/imgs/mastercard.png" alt="" class="paymentcard-img">
          <img src="http://174.138.3.35/esim/assets1/imgs/stripe.png" alt="" class="paymentcard-img">
          <img src="http://174.138.3.35/esim/assets1/imgs/visa.png" alt="" class="paymentcard-img">
        </div>
      </div>
    </div>
  </footer>  --}}
   @include('panels.footers')
  <script src="{{ url('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="{{ url('assets/js/js.js') }}"></script>

</body>

</html>