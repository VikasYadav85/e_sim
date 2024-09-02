@extends('layouts/contentLayoutMaster')
@section('title', 'E-SIMs')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
@if(Session::has('successMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('successMessage') }}">
@elseif(Session::has('alertMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('alertMessage') }}">
@endif
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
          <h2 class="card-title ">E-SIMs</h2>
          {{--<a href="{{ route('index_package') }}"><button type="reset" class="btn btn-primary me-1 waves-effect"> <i
                class="fas fa-arrow-left me-1"></i>Back</button></a>--}}
       <a href="{{route('get_esims_list')}}"><button class="btn btn-primary">Sync</button></a>

        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link tabcolor active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">E-SIMs</button>
          </li>
          {{--<li class="nav-item" role="presentation">
            <button class="nav-link tabcolor" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Simables</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link tabcolor" id="pills-package-countries-tab" data-bs-toggle="pill" data-bs-target="#pills-package-countries" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Users</button>
          </li>--}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTableExample1">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>ICCID</th>
                            <th>Matching Id</th>
                            <th>APN Type</th>
                            <th>Code</th>
                            <th>description</th>
                            <th>type</th>
                            <th>package id</th>
                            <th>quantity</th>
                            <th>package</th>
                            <th>esim type</th>
                            <th>validity</th>
                            <th>price</th>
                            <th>data</th>
                            <th>currency</th>
                            <th>user</th>
                            {{--<th>Action</th>--}}    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sims as $key => $sim)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $sim->iccid }}</td>
                            <td>{{ $sim->matching_id }}</td>
                            <td>{{ $sim->apn_type }}</td>
                            <td>{{ $sim->simable->code ?? '' }}</td>
                            <td>{{ $sim->simable->description ?? '' }}</td>
                            <td>{{ $sim->simable->type ?? '' }}</td>
                            <td>{{ $sim->simable->package_id ?? '' }}</td>
                            <td>{{ $sim->simable->quantity ?? '' }}</td>
                            <td>{{ $sim->simable->package ?? '' }}</td>
                            <td>{{ $sim->simable->esim_type ?? '' }}</td>
                            <td>{{ $sim->simable->validity ?? '' }}</td>
                            <td>{{ $sim->simable->price ?? '' }}</td>
                            <td>{{ $sim->simable->data ?? '' }}</td>
                            <td>{{ $sim->simable->currency ?? '' }}</td>
                            <td>{!! $sim->simable->user->name ?? '' !!}</td>
                            {{--<td>
                              <a href="{{ route('view_coverage', ['id' => $coverage->id]) }}" target="_blank">
                                <button class="btn btn-primary me-1 waves-effect">View</button>
                              </a>
                          </td>--}}
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
               {{--<tbody>
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
                </tbody>--}}
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
               {{--<tbody>
                    @foreach ($packageCountries as $key => $country)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $country->country_code }}</td>
                        <td>{{ ucfirst($country->title) }}</td>
                        <td>{{ $country->width }}</td>
                        <td>{{ $country->height }}</td>
                    </tr>
                    @endforeach
                </tbody>--}}
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
  var jq = $.noConflict();
jq(document).ready(function(){

  @if(Session::has('successMessage'))
      var toster=jq('#toster_id').val();
      if(toster!=''){
      Swal.fire({
       
      icon: 'success',
      title: ''+toster,
      showConfirmButton: false,
      timer: 2000
      })
      }
      
      {{ Session::forget('successMessage') }}
      
      @elseif(Session::has('alertMessage'))
      var toster=jq('#toster_id').val();
      if(toster != ''){
      Swal.fire({
       
      icon: 'warning',
      title: ''+toster,
      showConfirmButton: false,
      timer: 4000
      })
      }
      {{ Session::forget('alertMessage') }}

    @endif
});

</script>