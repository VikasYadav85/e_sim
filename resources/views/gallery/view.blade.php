@extends('layouts/contentLayoutMaster')

@section('title', 'About us')
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
          <h1 class="card-title" style="font-size:27px;">View About us</h1>
        </div>
        <hr class="bold-line">
        <div class="card-body">
          <form class="form form-vertical" role="form" action="{{route('Brand-save')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row"> 
              <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="contact-info-vertical">Title</label>
                  <input type="text" id="name" value="{{$AboutUs->title}}" class="form-control" name="name"
                    placeholder="name" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="password-vertical">Status</label>
                  <select class="form-control" id="status" name="status" disabled>
                    <option value=""></option>
                    <option value="Active" {{ $AboutUs->status == 'Active' ? ' selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $AboutUs->status == 'Inactive' ? ' selected' : '' }}>Inactive</option>
                  </select>
                </div>
              </div>

              <div class="col-6">
                <div class="mb-1">
                    <label class="form-label" for="password-vertical"> Image</label>
                </div>
                @if($AboutUs->image)
                <div class="mb-1">
                    <a href="{{ asset('images/about_us/' . $AboutUs->image) }}" class="example-image-link" data-lightbox="example-set">
                        <img src="{{ asset('images/about_us/' . $AboutUs->image) }}" alt="Logo Image" style="max-width: 100px;">
                    </a>
                </div>
                @endif
            </div>
              <div class="col-12">
                <div class="mb-1">
                  <label class="form-label" for="email-id-vertical"> Discription </label>
                  <textarea class="form-control" name="short_discription"
                    id="short_discription" readonly>{{ $AboutUs->discription}}</textarea>
                </div>
              </div>
              <input type="hidden" id="name" value="{{$AboutUs->id}}" class="form-control" name="updated_id"
                placeholder="">
              <div class="col-12 text-center mt-3">
                <a href="list-banner"><button type="reset" class="btn btn-outline-secondary waves-effect"
                  onclick="window.history.back()">Reset</button></a>

              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection