<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Register</title>
  <link rel="icon" type="image/x-icon" href="asia_assets/imgs/favicon.ico">

  <link href="asia_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asia_assets/css/swiper-bundle.min.css" rel="stylesheet">
  <link href="asia_assets/css/style.css" rel="stylesheet">

</head>

<body>

  @include('panels.header')
  <section class="section-space">
    <div class="container position-relative">
      <h1 class="section-title text-center">
        Stay connected, wherever you travel, at affordable rates
      </h1>
      <p class="details-text text-center"">
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
                <img src="asia_assets/imgs/Country-img-1.png" alt="" class="cover-img">
                <h3 class="country-name">
                  United States
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-2.png" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-3.png" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-4.png" alt="" class="cover-img">
                <h3 class="country-name">
                  Asia - Pasific
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-2.png" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-3.png" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
          </div>
          <div class="swiper-button-next">
            <img src="asia_assets/imgs/right-arrow.png" alt="">
          </div>
          <div class="swiper-button-prev">
            <img src="asia_assets/imgs/left-arrow.png" alt="">
          </div>
        </div>
        <div class="mt-4 mt-lg-5">
          <h2 class="section-title-sm mb-0">All</h2>
          <div class="row">
            <div class="col-12 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-15.png" alt="">
                  New Zealand
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt col-sm-6="">
              </a>
            </div>
            <div class=" mt-0 mt-sm-3col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-16.png" alt="">
                  United States
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-1.png" alt="">
                  Brunei
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-2.png" alt="">
                  India
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-3.png" alt="">
                  United Kingdom
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-4.png" alt="">
                  South Africa
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-5.png" alt="">
                  Canada
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-6.png" alt="">
                  Argentina
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-7.png" alt="">
                  Australia
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-8.png" alt="">
                  Austria
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-9.png" alt="">
                  Burundi
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-10.png" alt="">
                  Bulgaria
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-11.png" alt="">
                  Venezuela
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-12.png" alt="">
                  Tonga
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-13.png" alt="">
                  Jamaica
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-14.png" alt="">
                  Algeria
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade show active" id="pills-Regional" role="tabpanel" aria-labelledby="pills-Regional-tab">

        <h2 class="section-title-sm text-center mt-4">
          <img src="asia_assets/imgs/Asia.png" alt="" class="mr-2" />
          Asia
        </h2>
        <div class="mt-4 mt-lg-5">
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="regions-card">
                <div class="d-flex align-items-center justify-content-between p-3">
                  <h3 class="section-title-sm my-2">
                    Asialink
                  </h3>
                  <img src="asia_assets/imgs/asialink.png" alt="">
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/network.png">
                    Coverage
                  </span>
                  <span class="badge">
                    18 Countries
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/mobile-data.png">
                    Data
                  </span>
                  <span class="h6 m-0">
                    1 gb
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/schedule.png">
                    Validity
                  </span>
                  <span class="h6 m-0">
                    7 Days
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/tag-icon.png">
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
                  <img src="asia_assets/imgs/asialink.png" alt="">
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/network.png">
                    Coverage
                  </span>
                  <span class="badge">
                    18 Countries
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/mobile-data.png">
                    Data
                  </span>
                  <span class="h6 m-0">
                    1 gb
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/schedule.png">
                    Validity
                  </span>
                  <span class="h6 m-0">
                    7 Days
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/tag-icon.png">
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
                  <img src="asia_assets/imgs/asialink.png" alt="">
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/network.png">
                    Coverage
                  </span>
                  <span class="badge">
                    18 Countries
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/mobile-data.png">
                    Data
                  </span>
                  <span class="h6 m-0">
                    1 gb
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/schedule.png">
                    Validity
                  </span>
                  <span class="h6 m-0">
                    7 Days
                  </span>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                  <span class="d-flex gap-3">
                    <img src="asia_assets/imgs/tag-icon.png">
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
                <img src="asia_assets/imgs/Country-img-1.png" alt="" class="cover-img">
                <h3 class="country-name">
                  United States
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-2.png" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-3.png" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-4.png" alt="" class="cover-img">
                <h3 class="country-name">
                  Asia - Pasific
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-2.png" alt="" class="cover-img">
                <h3 class="country-name">
                  United Kingdom
                </h3>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="slide-country-box">
                <img src="asia_assets/imgs/Country-img-3.png" alt="" class="cover-img">
                <h3 class="country-name">
                  Canada
                </h3>
              </div>
            </div>
          </div>
          <div class="swiper-button-next">
            <img src="asia_assets/imgs/right-arrow.png" alt="">
          </div>
          <div class="swiper-button-prev">
            <img src="asia_assets/imgs/left-arrow.png" alt="">
          </div>
        </div>
        <div class="mt-4 mt-lg-5">
          <h2 class="section-title-sm mb-0">All</h2>
          <div class="row">
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-15.png" alt="">
                  New Zealand
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-16.png" alt="">
                  United States
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-1.png" alt="">
                  Brunei
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-2.png" alt="">
                  India
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-3.png" alt="">
                  United Kingdom
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-4.png" alt="">
                  South Africa
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-5.png" alt="">
                  Canada
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-6.png" alt="">
                  Argentina
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-7.png" alt="">
                  Australia
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-8.png" alt="">
                  Austria
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-9.png" alt="">
                  Burundi
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-10.png" alt="">
                  Bulgaria
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-11.png" alt="">
                  Venezuela
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-12.png" alt="">
                  Tonga
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-13.png" alt="">
                  Jamaica
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-3">
              <a href="" class="country-links">
                <div class="d-flex align-items-center gap-2">
                  <img src="asia_assets/imgs/flags/flag-14.png" alt="">
                  Algeria
                </div>
                <img src="asia_assets/imgs/arrow-down.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>


  <footer class="footer section-space pb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xl-3 col-xxl-4">
          <h6 class="fw-medium text-white mb-3 mb-lg-4">About Us</h6>
          <a href="">
            <img src="asia_assets/imgs/ft-logo.png" alt="">
          </a>
          <p class="details-text text-white my-3">
            AxurSIM is a digital channel for telecom services, enabling
            consumers to find and buy the best eSIM offers in the world.
          </p>
          <div class="d-flex gap-3">
            <a href="">
              <img src="asia_assets/imgs/facebook.png" alt="" class="social-ic">
            </a>
            <a href="">
              <img src="asia_assets/imgs/twitter.png" alt="" class="social-ic">
            </a>
            <a href="">
              <img src="asia_assets/imgs/insta.png" alt="" class="social-ic">
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
          <img src="asia_assets/imgs/apple-pay.png" alt="" class="paymentcard-img">
          <img src="asia_assets/imgs/g-pay.png" alt="" class="paymentcard-img">
          <img src="asia_assets/imgs/mastercard.png" alt="" class="paymentcard-img">
          <img src="asia_assets/imgs/stripe.png" alt="" class="paymentcard-img">
          <img src="asia_assets/imgs/visa.png" alt="" class="paymentcard-img">
        </div>
      </div>
    </div>
  </footer>


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
                <h3 class="section-title-sm">
                  Asialink
                </h3>
                <img src="asia_assets/imgs/Asialink-modal.png" class="img-fluid">
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="regions-card bg-white">
                  <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="asia_assets/imgs/network.png">
                      Coverage
                    </span>
                    <span class="badge">
                      18 Countries
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="asia_assets/imgs/mobile-data.png">
                      Data
                    </span>
                    <span class="h6 m-0">
                      1 gb
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="asia_assets/imgs/schedule.png">
                      Validity
                    </span>
                    <span class="h6 m-0">
                      7 Days
                    </span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center p-3 py-md-4 devider-card-content">
                    <span class="d-flex gap-3">
                      <img src="asia_assets/imgs/tag-icon.png">
                      Price
                    </span>
                    <span class="h6 m-0">
                      $5.00 USD
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="p-3 p-lg-4 mb-3 mb-lg-4">
            <h3 class="section-title-sm">Available Top-up Packages (4)</h3>
            <div class="swiper plan-slider mb-3 mb-lg-4">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="regions-card bg-white">
                    <div class="d-flex justify-content-center align-items-center p-3 devider-card-content">
                      <span class="h6 m-0">
                        1 gb - 7 days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/mobile-data.png">
                        Data
                      </span>
                      <span class="h6 m-0">
                        1 gb
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/schedule.png">
                        Validity
                      </span>
                      <span class="h6 m-0">
                        7 Days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/tag-icon.png">
                        Price
                      </span>
                      <span class="h6 m-0">
                        $5.00 USD
                      </span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="regions-card bg-white">
                    <div class="d-flex justify-content-center align-items-center p-3 devider-card-content">
                      <span class="h6 m-0">
                        1 gb - 7 days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/mobile-data.png">
                        Data
                      </span>
                      <span class="h6 m-0">
                        1 gb
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/schedule.png">
                        Validity
                      </span>
                      <span class="h6 m-0">
                        7 Days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/tag-icon.png">
                        Price
                      </span>
                      <span class="h6 m-0">
                        $5.00 USD
                      </span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="regions-card bg-white">
                    <div class="d-flex justify-content-center align-items-center p-3 devider-card-content">
                      <span class="h6 m-0">
                        1 gb - 7 days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/mobile-data.png">
                        Data
                      </span>
                      <span class="h6 m-0">
                        1 gb
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/schedule.png">
                        Validity
                      </span>
                      <span class="h6 m-0">
                        7 Days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/tag-icon.png">
                        Price
                      </span>
                      <span class="h6 m-0">
                        $5.00 USD
                      </span>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="regions-card bg-white">
                    <div class="d-flex justify-content-center align-items-center p-3 devider-card-content">
                      <span class="h6 m-0">
                        1 gb - 7 days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/mobile-data.png">
                        Data
                      </span>
                      <span class="h6 m-0">
                        1 gb
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/schedule.png">
                        Validity
                      </span>
                      <span class="h6 m-0">
                        7 Days
                      </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-3 devider-card-content">
                      <span class="d-flex gap-3">
                        <img src="asia_assets/imgs/tag-icon.png">
                        Price
                      </span>
                      <span class="h6 m-0">
                        $5.00 USD
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next">
                <img src="asia_assets/imgs/right-arrow.png" alt="">
              </div>
              <div class="swiper-button-prev">
                <img src="asia_assets/imgs/left-arrow.png" alt="">
              </div>
            </div>
            <h3 class="section-title-sm">Supported Countries</h3>
            <div class="bg-white shadow p-3 p-lg-4">
              <div class="">
                <input type="text" placeholder="Country Name" class="form-control p-2 px-3">
              </div>
              <div class="row mt-3 mt-sm-0">
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-15.png" alt="">
                      New Zealand
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-16.png" alt="">
                      United States
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-1.png" alt="">
                      Brunei
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-2.png" alt="">
                      India
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-3.png" alt="">
                      United Kingdom
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-4.png" alt="">
                      South Africa
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-5.png" alt="">
                      Canada
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-6.png" alt="">
                      Argentina
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-7.png" alt="">
                      Australia
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-8.png" alt="">
                      Austria
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-9.png" alt="">
                      Burundi
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-10.png" alt="">
                      Bulgaria
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-11.png" alt="">
                      Venezuela
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-12.png" alt="">
                      Tonga
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-13.png" alt="">
                      Jamaica
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                  <a href="" class="country-links mt-0 mt-sm-3">
                    <div class="d-flex align-items-center gap-2">
                      <img src="asia_assets/imgs/flags/flag-14.png" alt="">
                      Algeria
                    </div>
                    <img src="asia_assets/imgs/arrow-down.png" alt="">
                  </a>
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
                <h6 class="fw-bold m-0">Lower speeds should be expected in the Central
                  African Republic,Guinea Republic and Liberia.</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 justify-content-between p-3 px-lg-4">
          <h5 class="section-title-sm fw-bold m-0">$26.00 USD</h5>
          <button type="button" class="btn btn-default text-uppercase px-5">buy</button>
        </div>
      </div>
    </div>
  </div>

  <script src="asia_assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asia_assets/js/swiper-bundle.min.js"></script>
  <script src="asia_assets/js/jquery.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="asia_assets/js/js.js"></script>

</body>

</html>