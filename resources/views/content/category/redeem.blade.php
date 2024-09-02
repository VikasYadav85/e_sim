@extends('layouts/contentLayoutMaster')

@section('title', 'Redeem')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('content')


<!-- Basic multiple Column Form section start -->
<style>
.card {
    margin-bottom: 2rem;
    box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
    transition: all 0.3s ease-in-out, background 0s, color 0s, border-color 0s;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(34, 41, 47, 0.125);
    border-radius: 0.428rem;
}
*, *::before, *::after {
    box-sizing: border-box;
}

user agent stylesheet
div {
    display: block;
}
</style>
<section id="basic-vertical-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Redeem</h4>
        </div>
    
   <div class="card-body">

   @if($errors->any())

<input type="hidden" id="sweetMessage" value="{{$errors->first()}}">

@endif 
  
          <form class="form form-vertical" role="form" action="{{route('verify-coupon-code')}}" method="POST">
            @csrf
            <div class="card">
              <div class="card-header pb-0">
                <h4 class="card-title"></h4>
              </div>
              <div class="row">
                <div class="col-md-5 order-md-0 order-1">
                  <div class="card-body">

                      <div class="mb-2">
                        <label for="nameApiKey" class="form-label">Coupon Code</label>
                        <input class="form-control" type="text" name="code" placeholder="Coupon Code" id="nameApiKey" data-msg="Please enter Coupon Code" required autocomplete="off">
                      </div>

                      <div class="mb-2">
                        <label for="nameApiKey" class="form-label">Invoice No.</label>
                        <input class="form-control" type="text" name="invoice_id" placeholder="Invoice No" id="invoice_id" data-msg="Please enter API Invoice Id" required autocomplete="off">
                      </div>


                      <button type="submit" class="btn btn-primary w-100 waves-effect waves-float waves-light">Submit</button>
                    </form>
                  </div>
                </div>
                <div class="col-md-7 order-md-1 order-0">
                  <div class="text-center">
                    <img class="img-fluid text-center" src="http://159.223.107.48/cafe/public/images/illustration/pricing-Illustration.svg" alt="illustration" width="310">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</section>
<!-- Basic Floating Label Form section end -->
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

<link href="http://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">   
<script src="http://code.jquery.com/jquery-3.3.1.js"></script>

<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

@endsection

@section('page-script')


<script>

  var message = $('#sweetMessage').val();

  if(message){
    console.log(message);


    Swal.fire(
      
      message,
      
    )
  }



</script>



@endsection




