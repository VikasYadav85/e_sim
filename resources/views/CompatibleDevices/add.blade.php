@extends('layouts/contentLayoutMaster')

@section('title', 'Country')
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
                    <h1 class="card-title" style="font-size:27px;">
                        @if( isset($compatibleDevices) ? $compatibleDevices->model : '' )
                        View Compatible Device
                        @else
                        Add Compatible Device
                        @endif
                    </h1>
                </div>
                <hr class="bold-line">
                <div class="card-body">
                    <form class="form form-vertical" role="form" action="{{route('save-compatible-devices')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Model <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <input type="text" id="title" class="form-control" name="model" value="{{ isset($compatibleDevices) ? $compatibleDevices->model : '' }}" placeholder=" " readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">OS <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <input type="text" id="title" class="form-control" name="os" value="{{ isset($compatibleDevices) ? $compatibleDevices->os : '' }}" placeholder=" " readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Brand <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <input type="text" id="title" class="form-control" name="brand" value="{{ isset($compatibleDevices) ? $compatibleDevices->brand : '' }}" placeholder=" " readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Name <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <input type="text" id="title" class="form-control" name="name" value="{{ isset($compatibleDevices) ? $compatibleDevices->name : '' }}" placeholder=" " readonly>
                                </div>
                            </div>
                            <input type="hidden" id="title" class="form-control" name="updated_id" value="{{ isset($compatibleDevices) ? $compatibleDevices->id : '' }}" placeholder=" " required>
                              <div class="col-12 text-center mt-3">
                                <!-- <a class="rte button main" id="submit" title="Submit" onclick="submitContent()">Save</a> -->
                                <button type="button" class="btn btn-secondary waves-effect waves-float waves-light" onclick="history.back()">Back</button>
                            </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection
