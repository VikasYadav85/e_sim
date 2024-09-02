@extends('layouts/contentLayoutMaster')
@section('title', $operator->country_title)
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
<style>
  label {
    font-size: 15px !important;
    font-weight: bold;

  }
  /*.nav-pills .nav-link.active{
    background-color:#f1c30f !important;
  }*/
</style>

<!-- Basic multiple Column Form section start -->

<section id="basic-vertical-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title ">{{ $operator->country_title }}</h2>
          <a href="{{ route('index_package') }}"><button type="reset" class="btn btn-primary me-1 waves-effect"> <i
                class="fas fa-arrow-left me-1"></i>Back</button></a>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link tabcolor active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Coverages</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link tabcolor" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Package</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link tabcolor" id="pills-package-countries-tab" data-bs-toggle="pill" data-bs-target="#pills-package-countries" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Package Countries</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTableExample1">
                    <thead>
                        <tr>
                            <th style="width:20%">Sr No.</th>
                            <th style="width:70%">Name</th> 
                            <th>Action</th>    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coverages as $key => $coverage)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ ucfirst($coverage->name) }}</td>
                            <td>
                              <a href="{{ route('view_coverage', ['id' => $coverage->id]) }}" target="_blank">
                                <button class="btn btn-primary me-1 waves-effect">View</button>
                              </a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataTableExample1">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Package Id</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Day</th>
                        <th>Title</th>
                    </tr>
                </thead>
               <tbody>
                    @foreach ($packages as $key => $package)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ ucfirst($package->package_id) }}</td>
                        <td>{{ ucfirst($package->type) }}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->amount }}</td>
                        <td>{{ $package->day }}</td>
                        <td>{{ ucfirst($package->title) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
          </div>
          <div class="tab-pane fade" id="pills-package-countries" role="tabpanel" aria-labelledby="pills-package-countries-tab">
          <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="dataTableExample1">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Country Code</th>
                        <th>Title</th>
                        <th>Width</th>
                        <th>Height</th>
                    </tr>
                </thead>
               <tbody>
                    @foreach ($packageCountries as $key => $country)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $country->country_code }}</td>
                        <td>{{ ucfirst($country->title) }}</td>
                        <td>{{ $country->width }}</td>
                        <td>{{ $country->height }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
          </div>
        </div>        
      </div>
    </div>

  </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>