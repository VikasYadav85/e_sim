@extends('layouts/contentLayoutMaster')
@section('title', $coverage->name)
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
          <h2 class="card-title ">{{ $coverage->name }}</h2>
          <a href="{{ route('index_package') }}"><button type="reset" class="btn btn-primary me-1 waves-effect"> <i
                class="fas fa-arrow-left me-1"></i>Back</button></a>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link tabcolor active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Coverage Network</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTableExample1">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th>Network Types</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coverageNetworks as $key => $network) 
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $network->name }}</td>
                            <td>{{ (count($network->coverageNetworkTypes) > 0) ? implode(', ', $network->coverageNetworkTypes->pluck('types')->toArray()) : 'N/A' }}</td>
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