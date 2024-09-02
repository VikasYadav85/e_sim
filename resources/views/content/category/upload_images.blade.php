
@extends('layouts/contentLayoutMaster')

@section('title', 'Form Repeater')

@section('content')
<section class="form-control-repeater">
  <div class="row">
    <!-- Invoice repeater -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Branding </h4>
        </div> 
        <hr>
        <div class="card-body">
          <form id="form_id" role="form" action="{{route('background_image')}}" method="POST" class="invoice-repeater"  enctype="multipart/form-data" >
        {{csrf_field()}}
                <div class="row d-flex align-items-end">
 
                    <div class="col-md-6 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="bgImage">Backgroud Image</label>
                      <input
                        type="file"
                        name="background_image"
                        class="form-control"
                        id="bgImage"
                        aria-describedby="bgImage"
                        placeholder=""
                      />
                    </div>
                   
                    </div>



                    <div class="col-md-6 col-12">
                    <div class="mb-1">
                    <label class="form-label" for="logoImage">Logo Image</label>
                    <input
                        type="file"
                        class="form-control"
                        name="logo_image"

                        id="logoImage"
                        aria-describedby="logoImage"
                        placeholder=""
                    />
                    </div>
                   
                    </div>

                </div>
                <button type="submit"style="margin-left: 47%; margin-top:2%;" class="btn btn-primary me-1 shrink-0 flex items-center waves-effect waves-float waves-light"a href="">Submit</button>

          </form>
          
        </div>
      </div>
    </div>
    <!-- /Invoice repeater -->
  </div>
</section>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script>
  <!-- <script type='text/javascript' src='js/background.js'></script> -->

@endsection
