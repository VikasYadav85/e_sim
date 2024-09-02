@extends('layouts/contentLayoutMaster')
  <link rel="stylesheet" href="{{ asset('dist/css/lightbox.min.css') }}">
<script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
@section('title', 'Sustainability')

@section('content')


<!-- Basic multiple Column Form section start -->

<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> View Sustainability</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" role="form" action="{{('save_banner')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">title</label>
                                    <input type="text" value="{{$getdata->title}}" readonly class="form-control" name="Url" placeholder="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password-vertical">Photo</label>
                                </div>
                                <div class="mb-1">
                                    <a href="{{ asset('images/fe_image/' . $getdata->feature_image) }}" class="example-image-link" data-lightbox="example-set">
                                        <img src="{{ asset('images/fe_image/' . $getdata->feature_image) }}" alt="User Photo" style="max-width: 200px; border: 1px solid #ccc; padding: 5px;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">

                              <div class="mb-1">
                                  <label class="form-label" for="first-name-vertical">Short Description</label>
                                  <textarea class="form-control" name="text2" readonly  rows="4">{{$getdata->short_discription}}</textarea>
                              </div>
                          </div>
                            <div class="mb-1">
                                <label class="form-label" for="first-name-vertical">Discription</label>

                                <div style="border: 1px solid #c2c1c7; padding: 5px; background-color:#efefef;">
                                    {!! $getdata->discription !!}
                                </div>
                            </div>

                           <hr class="bold"
                            <div class="table-responsive">
                              <table id="faqs" class="table ">
                                  <thead>
                                      <tr>
                                          <th>Title</th>
                                          <th>Image</th>
                                          <th>Discription</th>
                                       
                                      </tr> 
                                  </thead>
                                  <tbody>
                                    @foreach ($SustainabilityDetail as $SustainabilityDetails)
                                      <tr>
                                          <td>{{ $SustainabilityDetails->title }}</td>
                                          <td>
                                            @if($SustainabilityDetails->image)
                                            <a href="{{ asset('images/SustainabilityDetail/' . $SustainabilityDetails->image) }}" class="example-image-link" data-lightbox="example-set">
                                              <img src="{{ asset('images/SustainabilityDetail/' . $SustainabilityDetails->image) }}" alt="User Photo" style="max-width: 100px;">
                                            </a>
                                            @else
                                            Not Found
                                            @endif
                                
                                          </td>
                                          <td>{{ $SustainabilityDetails->discription }}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>


                          </div>

                            <div class="col-12 text-center mt-3">
                                <!-- <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light"a href="#">Submit</button> -->
                                <a href="{{route('list-Sustainability')}}"><button type="button" class="btn btn-primary me-1 waves-effect waves-float waves-light">Back</button></a>
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
