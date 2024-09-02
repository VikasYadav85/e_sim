<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Register</title>
  <link rel="icon" type="image/x-icon" href="{{ url('public/assets/imgs/favicon.ico') }}">

  <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('asia_assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ url('asia_assets\css\style.css') }}" rel="stylesheet">
</head>

<body>
@include('panels.header')
  <section class="section-space">
    <div class="container position-relative">
      <h1 class="section-title text-center">
        Stay connected, wherever you travel, at affordable rates
      </h1>
      <p class="details-text text-center">
        Our eSIMs are trusted by over 11,000,000 people worldwide
      </p>
      <div class=" col-md-6 col-lg-5 p-0 mx-auto my-4">
        <input type="text" placeholder="Search data packs for 200+ country" class="form-control p-2 px-3">
    </div>
    <div class="d-flex justify-content-center">
      <ul class="nav country-tabs mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-Local-tab" data-bs-toggle="pill" data-bs-target="#pills-Local"
            type="button" role="tab" aria-controls="pills-Local" aria-selected="true">
            Local eSIMs
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-Regional-tab" data-bs-toggle="pill" data-bs-target="#pills-Regional"
            type="button" role="tab" aria-controls="pills-Regional" aria-selected="true">
            Regional eSIMs
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-Global-tab" data-bs-toggle="pill" data-bs-target="#pills-Global"
            type="button" role="tab" aria-controls="pills-Global" aria-selected="false">
            Global eSIMs
          </button>
        </li>
      </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade" id="pills-Local" role="tabpanel" aria-labelledby="pills-Local-tab">
        <h2 class="section-title-sm">Popular</h2>
        <div class="swiper country-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-1.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  United States
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-2.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-3.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-4.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  Asia - Pasific
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-2.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-3.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
          </div>
          <div class="swiper-button-next">
            <img src="{{ url('asia_assets/imgs/right-arrow.png') }}" alt="">
          </div>
          <div class="swiper-button-prev">
            <img src="{{ url('asia_assets/imgs/left-arrow.png') }}" alt="">
          </div>
        </div>
        <div class="mt-4 mt-lg-5">
          <h2 class="section-title-sm mb-0">All</h2>
          <div class="row">
            <div class="col-12 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-15.png') }}" alt="">
                  New Zealand
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt col-sm-6="">
              </a>
            </div>
            <div class=" mt-0 mt-sm-3col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-16.png') }}" alt="">
                  United States
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-1.png') }}" alt="">
                  Brunei
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-2.png') }}" alt="">
                  India
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-3.png') }}" alt="">
                  United Kingdom
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-4.png') }}" alt="">
                  South Africa
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-5.png') }}" alt="">
                  Canada
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('assets/imgs/flags/flag-6.png') }}" alt="">
                  Argentina
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-7.png') }}" alt="">
                  Australia
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-8.png') }}" alt="">
                  Austria
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-9.png') }}" alt="">
                  Burundi
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-10.png') }}" alt="">
                  Bulgaria
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-11.png') }}" alt="">
                  Venezuela
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-12.png') }}" alt="">
                  Tonga
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-13.png') }}" alt="">
                  Jamaica
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-14.png') }}" alt="">
                  Algeria
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade show active" id="pills-Regional" role="tabpanel" aria-labelledby="pills-Regional-tab">

        <h2 class="section-title-sm text-center mt-4">
          <img src="{{ url('asia_assets/imgs/Asia.png') }}" alt="" class="mr-2" />
          {{ $packageCountry->title }}
        </h2>
        <div class="mt-4 mt-lg-5">
          <div class="row">
            @foreach($packages as $package)
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="regions-card">
                  <div class="d-flex align-items-center justify-content-between p-3">
                    <h3 class="section-title-sm my-2">
                      {{ $packageCountry->title }}
                    </h3>
                    <img src="{{ url('asia_assets/imgs/asialink.png') }}" alt="">
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="{{ url('asia_assets/imgs/network.png') }}">
                      Coverage
                    </span>
                    <span class="badge">
                      {{ $packageCountryCount }} Countries
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="{{ url('asia_assets/imgs/mobile-data.png') }}">
                      Data
                    </span>
                    <span class="h6 m-0">
                      {{ $package->data }} gb
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="{{ url('asia_assets/imgs/schedule.png') }}">
                      Validity
                    </span>
                    <span class="h6 m-0">
                      {{ $package->day }} Days
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="{{ url('asia_assets/imgs/tag-icon.png') }}">
                      Price
                    </span>
                    <span class="h6 m-0">
                      ${{ $package->amount }} USD
                    </span>
                  </div>
                  <div class="p-3">
                    <a data-bs-toggle="modal" data-bs-target="#linkModal" data-title="{{ $packageCountry->title }}"
         data-data="{{ $package->data }}"
         data-days="{{ $package->day }}"
         data-amount="{{ $package->amount }}"
         data-short_info="{{ $package->short_info }}"
         onclick="openModal(this)" class="btn btn-default text-uppercase w-100">
                      buy now
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
            <!-- <div class="col-12 col-sm-6 col-lg-4">
              <div class="regions-card">
                <div class="d-flex align-items-center justify-content-between p-3">
                  <h3 class="section-title-sm my-2">
                    Asialink
                  </h3>
                  <img src="{{ url('asia_assets/imgs/asialink.png') }}" alt="">
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/network.png') }}">
                    Coverage
                  </span>
                  <span class="badge">
                    18 Countries
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/mobile-data.png') }}">
                    Data
                  </span>
                  <span class="h6 m-0">
                    1 gb
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/schedule.png') }}">
                    Validity
                  </span>
                  <span class="h6 m-0">
                    7 Days
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/tag-icon.png') }}">
                    Price
                  </span>
                  <span class="h6 m-0">
                    $5.00 USD
                  </span>
                </div>
                <div class="p-3">
                  <a data-bs-toggle="modal" data-bs-target="#linkModal" class="btn btn-default text-uppercase w-100">
                    buy now
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="regions-card">
                <div class="d-flex align-items-center justify-content-between p-3">
                  <h3 class="section-title-sm my-2">
                    Asialink
                  </h3>
                  <img src="{{ url('asia_assets/imgs/asialink.png') }}" alt="">
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/network.png') }}">
                    Coverage
                  </span>
                  <span class="badge">
                    18 Countries
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/mobile-data.png') }}">
                    Data
                  </span>
                  <span class="h6 m-0">
                    1 gb
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/schedule.png') }}">
                    Validity
                  </span>
                  <span class="h6 m-0">
                    7 Days
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('asia_assets/imgs/tag-icon.png') }}">
                    Price
                  </span>
                  <span class="h6 m-0">
                    $5.00 USD
                  </span>
                </div>
                <div class="p-3">
                  <a data-bs-toggle="modal" data-bs-target="#linkModal" class="btn btn-default text-uppercase w-100">
                    buy now
                  </a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        <div class="mt-4 text-center">
          <a href="" class="btn btn-secondary text-uppercase">
            show all regions
          </a>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-Global" role="tabpanel" aria-labelledby="pills-Global-tab">
        <div class="col-md-6 col-lg-5 p-0 mx-auto my-4">
          <input type="text" placeholder="Search" class="form-control p-2 px-3">
        </div>
        <h2 class="section-title-sm">Popular</h2>
        <div class="swiper country-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-1.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  United States
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-2.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-3.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-4.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  Asia - Pasific
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-2.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="{{ url('asia_assets/imgs/Country-img-3.png') }}" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
          </div>
          <div class="swiper-button-next">
            <img src="{{ url('asia_assets/imgs/right-arrow.png') }}" alt="">
          </div>
          <div class="swiper-button-prev">
            <img src="{{ url('asia_assets/imgs/left-arrow.png') }}" alt="">
          </div>
        </div>
        <div class="mt-4 mt-lg-5">
          <h2 class="section-title-sm mb-0">All</h2>
          <div class="row">
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-15.png') }}" alt="">
                  New Zealand
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-16.png') }}" alt="">
                  United States
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-1.png') }}" alt="">
                  Brunei
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-2.png') }}" alt="">
                  India
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-3.png') }}" alt="">
                  United Kingdom
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-4.png') }}" alt="">
                  South Africa
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-5.png') }}" alt="">
                  Canada
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-6.png') }}" alt="">
                  Argentina
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-7.png') }}" alt="">
                  Australia
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-8.png') }}" alt="">
                  Austria
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-9.png') }}" alt="">
                  Burundi
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-10.png') }}" alt="">
                  Bulgaria
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-11.png') }}" alt="">
                  Venezuela
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-12.png') }}" alt="">
                  Tonga
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-13.png') }}" alt="">
                  Jamaica
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="{{ url('asia_assets/imgs/flags/flag-14.png') }}" alt="">
                  Algeria
                </div>
                <img src="{{ url('asia_assets/imgs/arrow-down.png') }}" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>


@include('panels.footers')


  <!-- Modal -->
  <div class="modal fade linkModal" id="linkModal" tabindex="-1" aria-labelledby="linkModalLabel"
    aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content border-0">
        <div class="modal-body p-0">
          <div class="blue-bg-card p-3 p-lg-4">
            <div class="row justify-content-between align-items-center">
              <div class="col-12 col-md-6">
              <h3 class="section-title-sm modal-title">
                <!-- Dynamic Title -->
              </h3>
              <img src="{{ url('public/assets/imgs/Asialink-modal.png') }}" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <div class="regions-card bg-white">
                <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('public/assets/imgs/network.png') }}">
                    Coverage
                  </span>
                  <span class="badge">
                    {{ $packageCountryCount}} Countries
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('public/assets/imgs/mobile-data.png') }}">
                    Data
                  </span>
                  <span class="h6 m-0 data-amount">
                    <!-- Dynamic Data Amount -->
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('public/assets/imgs/schedule.png') }}">
                    Validity
                  </span>
                  <span class="h6 m-0 data-days">
                    <!-- Dynamic Days -->
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="{{ url('public/assets/imgs/tag-icon.png') }}">
                    Price
                  </span>
                  <span id="price" class="h6 m-0 data-price">
                    <!-- Dynamic Price -->
                  </span>
                </div>
              </div>
            </div>
            
            </div>
          </div>
          <div class="p-3 p-lg-4">
            <h3 class="section-title-sm">Additional Information</h3>
            <div class="row mb-3">
              <div class="col-12 col-md-6 col-xl-4">
                <p class="details-text text-uppercase m-0">IP ROUTING</p>
                <h6 class="fw-bold m-0">Yes</h6>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <p class="details-text text-uppercase m-0">TOP-UP OPTIONs</p>
                <h6 class="fw-bold m-0">Available</h6>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-xl-4">
                <p class="details-text m-0">eKYC  (IDENTITY VERIFICATION)</p>
                <h6 class="fw-bold m-0">Not Required</h6>
              </div>
              <div class="col-12 col-md-6 col-xl-6">
                <p class="details-text text-uppercase m-0">OTHER INFO</p>
                <h6 class="fw-bold m-0 other-info"></h6>
              </div>
            </div>
          </div>
          <div class="p-3 p-lg-4">
            <h3 class="section-title-sm">Payment Method</h3>
            <div class="row">
              <div class="col-12 col-md-6 col-xl-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="paypal" checked>
                    <label class="form-check-label" for="paypal">
                    Paypal
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="alipay" disabled>
                    <label class="form-check-label" for="alipay">
                    Alipay
                    </label>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 justify-content-between p-3 px-lg-4">
          <h5 class="section-title-sm fw-bold m-0">$26.00 USD</h5>
          <button id="buyButton" type="button" class="btn btn-default text-uppercase px-5">buy</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  {{--  <script src="{{ url('asia_assets/js/swiper-bundle.min.js') }}"></script> 
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="https://unpkg.com/feather-icons') }}"></script>
  <script src="{{ url('asia_assets/js/js.js') }}"></script>   --}}
    <script src="http://174.138.3.35/esim/asia_assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://174.138.3.35/esim/asia_assets/js/swiper-bundle.min.js"></script>
  <script src="http://174.138.3.35/esim/asia_assets/js/jquery.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="http://174.138.3.35/esim/asia_assets/js/js.js"></script>
    <script src="{{ url('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript">
    function openModal(button) {
      @if(Auth::guard('esim_customer')->user())
    // Get the data attributes from the clicked button
    const title = button.getAttribute('data-title');
    const data = button.getAttribute('data-data');
    const days = button.getAttribute('data-days');
    const amount = button.getAttribute('data-amount');
    const short_info = button.getAttribute('data-short_info');
    $('.other-info').text(short_info)
    //console.log(amount)

    // Get modal elements
    const modal = document.getElementById('linkModal');
    const modalTitle = modal.querySelector('.modal-body .section-title-sm');
    const modalData = modal.querySelector('.modal-body .data-amount');
    const modalDays = modal.querySelector('.modal-body .data-days');
    const modalPrice = modal.querySelector('.modal-body .data-price');
    const modalFooterPrice = modal.querySelector('.modal-footer .section-title-sm');
    
    // Set modal content
    modalTitle.textContent = title;
    modalData.textContent = `${data} gb`;
    modalDays.textContent = `${days} Days`;
    modalPrice.textContent = `$${amount} USD`;
    modalFooterPrice.textContent = `$${amount} USD`;
    @else
     window.location.href = "{{ route('front_login') }}";
    @endif
  }
</script>
  <script>
$(document).ready(function(){
    $('#buyButton').click(function(){
        var price = $('#price').text().trim();
        $.ajax({
            url: "{{ route('paypal.checkout') }}", 
            type: 'get',
            data: { price: price },
            success: function(response) {
              if(response.link!='' && response.link != undefined){
                window.location.href = response.link;
              }else{
                alert('Something went wrong, please try again later');
              }
                //console.log('Price sent successfully:', response);
            },
            error: function(error) {
                //console.log('Error sending price:', error);
            }
        });
    });
});
</script>
  

</body>

</html>