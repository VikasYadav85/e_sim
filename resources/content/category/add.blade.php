@extends('layouts/contentLayoutMaster')

@section('title', 'Add Category')

@section('content')


<!-- Basic multiple Column Form section start -->

<section id="basic-vertical-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Vertical Form</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical" role="form" action="{{route('save-coupon')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="first-name-vertical" >Coupon code</label>
                  <input type="text" id="first-name-vertical" class="form-control" name="code" placeholder="Coupon Code">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="email-id-vertical">Coupon Value</label>
                  <input type="text" id="coupon-value-vertical" class="form-control" name="value" placeholder="Coupon Value">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="contact-info-vertical">Mobile Number</label>
                  <input type="number" id="contact-info-vertical" class="form-control" name="number" placeholder="Mobile Number">
                </div>
              </div>
              <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="password-vertical">Expiry Date</label>
                  <input type="date"  class="form-control" name="date" placeholder="Expiry Date">
                </div>
              </div>

              <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"a href="{{route('list-coupon')}}">Submit</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection


