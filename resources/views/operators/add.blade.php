@extends('layouts/contentLayoutMaster')
@section('title', 'E-SIM Plan')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<style>
   label {
   font-size: 15px !important;
   font-weight: bold; 
   }
</style>
<!-- Basic multiple Column Form section start -->
<section id="basic-vertical-layouts">
   <div class="row">
      <div class="col-md-12 col-12">
         <div class="card">
            <div class="card-header ">
               <h1 class="card-title" style="font-size:27px;"> E-SIM Plan</h1>
            </div>
            <hr class="bold-line">
            <div class="card-body">
               <form class="form form-vertical" role="form" action="{{route('store_e_sim_plan')}}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" class="form-control" name="updated_id" value="{{ isset($eSIMPlan) ? $eSIMPlan->id : '' }}" placeholder=" " required>
                  <div class="row">
                     <div class="col-6">
                        <div class="mb-1">
                           <label class="form-label" for="contact-info-vertical">Heading <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <input type="text" class="form-control" name="heading" value="{{ isset($eSIMPlan) ? $eSIMPlan->heading : '' }}" placeholder="Heading" required> 
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="mb-1">
                           <label class="form-label" for="contact-info-vertical">Sub Heading <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <input type="text" class="form-control" name="sub_heading" value="{{ isset($eSIMPlan) ? $eSIMPlan->sub_heading : '' }}" placeholder="Sub Heading" required> 
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6">
                        <div class="mb-1">
                           <label class="form-label" for="contact-info-vertical">Select Country <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <select name="country_id[]" class="form-control" multiple>
                              <option value="">Select Country</option>
                              @foreach($countries as $country)
                              <option value="{{ $country->id }}" {{ isset($eSIMPlan) && $eSIMPlan->id == $country->id ? 'selected' : '' }}>
                                   {{ $country->country ?? 'N/A' }}
                               </option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="mb-1">
                           <label class="form-label" for="contact-info-vertical">Validity <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <input type="text" class="form-control" name="validity" value="{{ isset($eSIMPlan) ? $eSIMPlan->validity : '' }}" placeholder="Validity" required> 
         
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6">
                        <div class="mb-1">
                           <label class="form-label" for="contact-info-vertical">Data <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <input type="text" class="form-control" name="data" value="{{ isset($eSIMPlan) ? $eSIMPlan->data : '' }}" placeholder="Data" required> 
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="mb-1">
                           <label class="form-label" for="contact-info-vertical">Price <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <input type="text" class="form-control" name="price" value="{{ isset($eSIMPlan) ? $eSIMPlan->price : '' }}" placeholder="Price" required> 
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="mb-1">
                           <label class="form-label" for="password-vertical">Status <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                           <select class="form-control" id="status" name="status" required>
                              <option value="">Select Status</option>
                              <option value="1" {{ isset($eSIMPlan) && $eSIMPlan->status == "1" ? 'selected' : '' }}>Active</option>
                              <option value="0" {{ isset($eSIMPlan) && $eSIMPlan->status == "0" ? 'selected' : '' }}>Inactive</option>
                           </select>
                        </div>
                     </div>
                  </div>                  
                  <div class="col-12 text-center mt-3">
                     <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection