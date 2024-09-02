<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Register</title>
  <link rel="icon" type="image/x-icon" href="http://174.138.3.35/esim/assets1/imgs/favicon.ico">

  <link href="http://174.138.3.35/esim/assets1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://174.138.3.35/esim/assets1/css/swiper-bundle.min.css" rel="stylesheet">
  <link href="http://174.138.3.35/esim/assets1/css/style.css" rel="stylesheet">

</head>

<body>

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

 
  @include('panels.header')
  <section class="section-space">
    <div class="container position-relative">
      <h1 class="section-title text-center">
        Select a Package
      </h1>
      <div class="d-flex justify-content-center">
        <ul class="nav country-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
              type="button" role="tab" aria-controls="pills-home" aria-selected="true">Country</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
              type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Regions</button>
          </li>
        </ul>
      </div>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="col-md-6 col-lg-5 p-0 mx-auto my-4">
            <input type="text" placeholder="Search" class="form-control p-2 px-3">
          </div>
          <h2 class="section-title-sm">Popular</h2>
          <div class="swiper country-swiper">
            <div class="swiper-wrapper">
              @foreach($packages->packageCountry as $country)
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-1.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    {{ $country->title }}
                  </h3>
                </div>
              </div>
              @endforeach
              {{--<div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-2.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    United Kingdom
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-3.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    Canada
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-4.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    Asia - Pasific
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-2.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    United Kingdom
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-3.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    Canada
                  </h3>
                </div>
              </div>--}}
            </div>
            <div class="swiper-button-next">
              <img src="http://174.138.3.35/esim/assets1/imgs/right-arrow.png" alt="">
            </div>
            <div class="swiper-button-prev">
              <img src="http://174.138.3.35/esim/assets1/imgs/left-arrow.png" alt="">
            </div>
          </div>
          <div class="mt-4 mt-lg-5">
            <h2 class="section-title-sm mb-0">All</h2>
            <div class="row">
              @foreach($countries as $country)
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('public/images/country/' . $country->image) }}" height="32" width="32" alt="">
                    {{ $country->country }}
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              @endforeach
             {{-- <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-16.png" alt="">
                    United States
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-1.png" alt="">
                    Brunei
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-2.png" alt="">
                    India
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-3.png" alt="">
                    United Kingdom
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-4.png" alt="">
                    South Africa
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-5.png" alt="">
                    Canada
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-6.png" alt="">
                    Argentina
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-7.png" alt="">
                    Australia
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-8.png" alt="">
                    Austria
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-9.png" alt="">
                    Burundi
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-10.png" alt="">
                    Bulgaria
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-11.png" alt="">
                    Venezuela
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-12.png" alt="">
                    Tonga
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-13.png" alt="">
                    Jamaica
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-14.png" alt="">
                    Algeria
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="col-md-6 col-lg-5 p-0 mx-auto my-4">
            <input type="text" placeholder="Search" class="form-control p-2 px-3">
          </div>
          <h2 class="section-title-sm">Popular</h2>
          <div class="swiper country-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-1.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    United States
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-2.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    United Kingdom
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-3.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    Canada
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-4.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    Asia - Pasific
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-2.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    United Kingdom
                  </h3>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-country-box">
                  <img src="http://174.138.3.35/esim/assets1/imgs/Country-img-3.png" alt="" class="cover-img">
                  <h3 class="country-name">
                    Canada
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-button-next">
              <img src="http://174.138.3.35/esim/assets1/imgs/right-arrow.png" alt="">
            </div>
            <div class="swiper-button-prev">
              <img src="http://174.138.3.35/esim/assets1/imgs/left-arrow.png" alt="">
            </div>
          </div>
          <div class="mt-4 mt-lg-5">
            <h2 class="section-title-sm mb-0">All</h2>
            <div class="row">
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-15.png" alt="">
                    New Zealand
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-16.png" alt="">
                    United States
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-1.png" alt="">
                    Brunei
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-2.png" alt="">
                    India
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-3.png" alt="">
                    United Kingdom
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-4.png" alt="">
                    South Africa
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-5.png" alt="">
                    Canada
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-6.png" alt="">
                    Argentina
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-7.png" alt="">
                    Australia
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-8.png" alt="">
                    Austria
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-9.png" alt="">
                    Burundi
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-10.png" alt="">
                    Bulgaria
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-11.png" alt="">
                    Venezuela
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-12.png" alt="">
                    Tonga
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-13.png" alt="">
                    Jamaica
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
              <div class="col-6 col-md-4 col-xl-3">
                <a href="" class="country-links">
                  <div class="d-flex align-items-center gap-2">
                    <img src="http://174.138.3.35/esim/assets1/imgs/flags/flag-14.png" alt="">
                    Algeria
                  </div>
                  <img src="http://174.138.3.35/esim/assets1/imgs/arrow-down.png" alt="">
                </a>
              </div>
            </div>
          </div>
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
  <script src="http://174.138.3.35/esim/assets1/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://174.138.3.35/esim/assets1/js/swiper-bundle.min.js"></script>
  <script src="http://174.138.3.35/esim/assets1/js/jquery.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="http://174.138.3.35/esim/assets1/js/js.js"></script>

</body>

</html>