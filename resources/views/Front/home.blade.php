<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Home</title> 
  <link rel="icon" type="image/x-icon" href="assets1/imgs/favicon.ico">

  <link href="assets1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets1/css/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets1/css/style.css" rel="stylesheet">
 <style>
  .image-container {
    display: flex;
    gap: 10px;
    overflow: hidden;
  }
  .image-container img {
    display: none;
  }
  .image-container img.visible {
    display: inline;
  }
  .plus-button {
    cursor: pointer;
    color: blue;
    text-decoration: underline;
    margin-left: 10px;
  }
</style>
</head>

<body>
 
  @include('panels.header')
 
  <section class="section-space hero-banner overflow-hidden">
    <div class="container position-relative">
      <div class="row flex-lg-row-reverse">
        <div class="col-12 col-lg-6">
          <img src="assets1/imgs/banner-img.png" alt="" class="img-fluid bn-img">
        </div>
        <div class="col-12 col-lg-6">
          <div class="caption-wrapper">
            <h1 class="title-font">
              <span class="d-block secondary-color"> <span class="devider-text">eSIM</span> Data </span>
              Packages to keep
              you Connected
            </h1>
            <p class="details-text mb-3 mb-md-4 pb-md-2">
              Use local data, wherever you are.Never pay roaming charges again.
            </p>
            <form>
              <div class="form-group icon-group">
                <input type="text" class="form-control" id="searchDestination" placeholder=" Search for destination...">
                <span class="control-icon">
                  <img src="assets1/imgs/search.png" alt="">
                </span>
              </div>
            </form>
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-4 mt-4">
              <img src="assets1/imgs/feedback-img.png" alt="" class="img-fluid">
              <div class="pt-2">
                <h6 class="fw-bold m-0">
                  20K
                </h6>
                <p class="details-text m-0">Feedback</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-space">
    <div class="container" id="popular">
      <h2 class="section-title-sm text-center mb-0">
        Popular eSIM Destinations
      </h2>
      <div class="row justify-content-between">
        @foreach ($packageCountries as $packageCountriesss)
        <div class="col-4 col-sm-3 col-md-2 col-xl-auto">
          <a href="{{url('shop-now-id/'.$packageCountriesss->operator_id)}}">
          <div class="country-box">
            <div class="country-flag">
              <img src="{{$packageCountriesss->url}}">
            </div>
            <h3 class="sm-title">{{$packageCountriesss->title}}</h3>
          </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="py-5 pt-0">
    <div class="container text-center">
      <h2 class="section-title mb-3">
        Wait, what’s an eSIM?
      </h2>
      <div class="col-lg-6 mx-auto">
        <p class="details-text mb-0">
          An eSIM is a digital SIM card, and most newer devices already support eSIM. It’s easy to add prepaid eSIM data
          packages anytime you want, right on your device.
        </p>
      </div>
    </div>
  </section>
  <section class="section-space packages-section">
    <div class="container">
      <h2 class="section-title text-center text-white mb-0">
        Popular eSIM packages
      </h2>
      <div class="row">


      @foreach ($operator as $operators)
      
       <div class="col-12 col-lg-6">
          <div class="packages-box">
            <div class="row justify-content-between gap-2">
              <div class="col-12 col-md-6">
                <a href="{{url('operator-id/'.$operators->operator_id)}}">
                  <h3 class="section-title-sm darkprimary mb-0">
                    {{$operators->country_title}} {{$operators->country_code}}  {{$packages->data}} 
                  </h3>
                </a>
               
                <p class="details-text m-0 secondary-color">
                  {{$packages->short_info}}
                </p>
              </div>
              <div class="col-12 col-md-auto">
                <div class="d-flex flex-wrap align-items-center gap-2">
                  <p class="details-text mb-0 darkprimary-color">
                    Works In

                  </p>
               <div class="d-flex gap-2 align-items-center">
                <div class="image-container" id="imageContainer_{{$operators->id}}">
                <input type="hidden" value="{{$operators->id}}" class="data_id">
                  @foreach($packageCountries as $index => $packageCountriess)
                  
                    <img src="assets1/imgs/country-1.png" alt="" class="{{ $index < 4 ? 'visible' : '' }}">

                    
                  @endforeach
                </div>
                <div class="plus-button" value="{{$operators->id}}" id="plusButton_{{$operators->id}}">+ More</div>
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
                   {{$packages->day}}
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
                   {{$packages->data}}
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
                    ${{$packages->price}}
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


      
        @endforeach
        
         
         
      </div>
      <div class="mt-5 text-center">
        <h2 class="section-title text-white">
          Popular eSIM packages
        </h2>
        <a href="" class="btn btn-default">
          Shop eSIMs now
        </a>
      </div>
    </div>
  </section>
  <section class="section-space">
    <div class="container text-center">
      <h2 class="section-title mb-3">
        Upgrade your Device with AxureSIM
      </h2>
      <div class="col-lg-6 mx-auto">
        <p class="details-text mb-0">
          It s as easy as inserting a SIM Card.
        </p>
      </div>
      <div class="row">
        <div class="col-12 col-md-4">
          <div class="mt-4 mt-md-5">
            <img src="assets1/imgs/insert-sim.png" alt="" class="img-fluid dowmload-ic">
            <h3 class="section-title-sm my-2 darkprimary-color">
              Insert the Card
            </h3>
            <p class="details-text">
              Simply insert the AxureSIM Card into the Sim Card slot. Reboot your device if necessary.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="mt-4 mt-md-5">
            <img src="assets1/imgs/install-app.png" alt="" class="img-fluid dowmload-ic">
            <h3 class="section-title-sm my-2 darkprimary-color">
              Install the APP
            </h3>
            <p class="details-text">
              Download the AxureSIM APP from the Playstore and follow the steps to register your account.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="mt-4 mt-md-5">
            <img src="assets1/imgs/download-esim.png" alt="" class="img-fluid dowmload-ic">
            <h3 class="section-title-sm my-2 darkprimary-color">
              Download eSIM profiles
            </h3>
            <p class="details-text">
              After the registration process is completed, you can start downloading eSIM profiles.
            </p>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="" class="btn btn-default">
          Shop Now
        </a>
      </div>
    </div>
  </section>
  <section class="section-space lightgray-bg">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <p class="details-text h5 mb-1">Unlimited possible</p>
          <h2 class="section-title">
            Get your Fastest Speed
          </h2>
          <img src="assets1/imgs/map.png" alt="" class="img-fluid">
          <a href="" class="btn btn-default">
            Check coverage map
          </a>
        </div>
        <div class="col-12 col-lg-6">
          <div class="accordion mt-4 mt-lg-0" id="faqaccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  What is eSIM or eSIM Card?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#faqaccordion">
                <div class="accordion-body">
                  <p class="details-text details-text-sm m-0">
                    An eSIM is an online extension of your regular SIM card. This SIM can be downloaded and exists as a
                    digital version. With an eSIM card, you will no longer need to have access to the physical SIM card
                    of your phone.
                  </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  What are the benefits of eSIM?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#faqaccordion">
                <div class="accordion-body">
                  <p class="details-text details-text-sm m-0">
                    An eSIM is an online extension of your regular SIM card. This SIM can be downloaded and exists as a
                    digital version. With an eSIM card, you will no longer need to have access to the physical SIM card
                    of your phone.
                  </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Can we convert physical sim to eSIM?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#faqaccordion">
                <div class="accordion-body">
                  <p class="details-text details-text-sm m-0">
                    An eSIM is an online extension of your regular SIM card. This SIM can be downloaded and exists as a
                    digital version. With an eSIM card, you will no longer need to have access to the physical SIM card
                    of your phone.
                  </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  What is eSIM or eSIM Card?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#faqaccordion">
                <div class="accordion-body">
                  <p class="details-text details-text-sm m-0">
                    An eSIM is an online extension of your regular SIM card. This SIM can be downloaded and exists as a
                    digital version. With an eSIM card, you will no longer need to have access to the physical SIM card
                    of your phone.
                  </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  How much time will it take to activate eSIM?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#faqaccordion">
                <div class="accordion-body">
                  <p class="details-text details-text-sm m-0">
                    An eSIM is an online extension of your regular SIM card. This SIM can be downloaded and exists as a
                    digital version. With an eSIM card, you will no longer need to have access to the physical SIM card
                    of your phone.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-space pb-0">
    <div class="container">
      <div class="cta-wrapper">
        <div class="col-md-6 p-0">
          <h2 class="section-title text-white mb-3">
            Shop online or 'use' the app
          </h2>
          <p class="details-text text-white">
            It’s easy to add, cancel, or
            <span class="d-block">
              manage your eSIMs anywhere, anytime!
            </span>
          </p>
          <a href="" class="btn btn-default">
            SHOW ME eSIM PLANS
          </a>
        </div>
        <img src="assets1/imgs/app-img.png" alt="" class="cta-img img-fluid">
      </div>
    </div>
  </section>
  <section class="section-space">
    <div class="container">
      <h2 class="section-title text-center mb-3">
        Hear from our Customers
      </h2>
      <div class="swiper testimonial-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="text-center col-10 mx-auto">
              <div class="user-icon">
                <img src="assets1/imgs/test-user.png" alt="">
              </div>
              <h6 class="username darkprimary-color fw-500">
                Petrik Stone
              </h6>
              <p class="details-text my-4">
                I love it so much. Thank you for making our lives so easy to communicate in anywhere just do AxureSIM.
                BIG fan and I’d recommend it to anyone. Really easy to purchase and install on iPhone, easy to activate
                and had great service everywhere I went.Works an absolute treat and certainly in Turkey coverage is
                superb. Used a few times now. Excellent value and wouldn’t hesitate to recommend.
              </p>
              <img src="assets1/imgs/quote-icon.png" alt="" class="mt-4">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="text-center col-10 mx-auto">
              <div class="user-icon">
                <img src="assets1/imgs/test-user.png" alt="">
              </div>
              <h6 class="username darkprimary-color fw-500">
                Petrik Stone
              </h6>
              <p class="details-text my-4">
                I love it so much. Thank you for making our lives so easy to communicate in anywhere just do AxureSIM.
                BIG fan and I’d recommend it to anyone. Really easy to purchase and install on iPhone, easy to activate
                and had great service everywhere I went.Works an absolute treat and certainly in Turkey coverage is
                superb. Used a few times now. Excellent value and wouldn’t hesitate to recommend.
              </p>
              <img src="assets1/imgs/quote-icon.png" alt="" class="mt-4">
            </div>
          </div>
        </div>
        <div class="swiper-button-next">
          <img src="assets1/imgs/right-arrow.png" alt="">
        </div>
        <div class="swiper-button-prev">
          <img src="assets1/imgs/left-arrow.png" alt="">
        </div>
      </div>
    </div>
  </section>




  @include('panels.footers')

  <!-- language dropdown -->
  <div class="dropdown language-dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
      aria-expanded="false">
      <img src="assets1/imgs/internet.png">
      <span class="d-none d-md-block">English</span>
      <span class="d-md-none">EN</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li><a class="dropdown-item" href="#">English</a></li>
      <li><a class="dropdown-item" href="#">German</a></li>
      <li><a class="dropdown-item" href="#">Spanish</a></li>
    </ul>
  </div>

  <div class="chat-boaticon">
    <img src="assets1/imgs/chat-ic.png">
  </div>

  <script src="assets1/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/js/swiper-bundle.min.js"></script>
  <script src="assets1/js/jquery.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  --}}
  <script src="assets1/js/js.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
 <!-- Assuming you have jQuery included -->
 
<script>
  $(document).ready(function() {
    @if(Session::has('error')) 
         Swal.fire({
          title: "Oops!",
          text: "{{Session::get('error')}}!",
          icon: "error"
        });
    @elseif(Session::has('success'))

     Swal.fire({
  title: "Successfully",
  text: "{{Session::get('success')}}",
  icon: "success"
});
          
    @endif
    
    $('.plus-button').on('click', function() {
      const data_id = $(this).attr('value');
      const imageContainer = $('#imageContainer_' + data_id);
      const images = imageContainer.find('img');

      images.each(function(index) {
        $(this).toggleClass('visible');
      });

      const isExpanded = images.filter('.visible').length > 4;
      const plusButton = $('#plusButton_' + data_id);
      plusButton.text(isExpanded ? '- Less' : '+ More');
    });

    $('#searchDestination').keyup(function(){
      var search = $(this).val();
      $.ajax({
        url:"{{route('searchDestination')}}",
        method:"get",
        data:{search:search},
        success:function(response){
          $('#popular').html(response);
        }
      });
    })
  });
</script>
