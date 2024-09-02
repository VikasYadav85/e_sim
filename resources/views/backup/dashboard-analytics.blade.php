
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
  @endsection   

@section('content')
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  <div class="row match-height">

  <input type="hidden" name="user_name" id="user_name" value="{{ucfirst($user)}}">

    <!-- Greetings Card starts -->
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="card card-congratulations">
        <div class="card-body text-center">
          <img
            src="{{asset('images/elements/decore-left.png')}}"
            class="congratulations-img-left"
            alt="card-img-left"
          />
          <img
            src="{{asset('images/elements/decore-right.png')}}"
            class="congratulations-img-right"
            alt="card-img-right"
          />
          <div class="avatar avatar-xl bg-primary shadow">
            <div class="avatar-content">
              <i data-feather="award" class="font-large-1"></i>
            </div>   
          </div>
          <div class="text-center">
            <h1 class="mb-1 text-white">Welcome {{ucfirst($user)}},</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Greetings Card ends -->

     <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
       <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              
            </div>
          </div>
          <h2 class="fw-bolder mt-1">URA Live Date</h2>
          <p class="card-text"><b style="font-size: 17px;">{{date("d-M-Y", strtotime($ura_live_date))}} </b></p>
          
        </div>   
        
       </div>
    </div>
    <!-- Subscribers Chart Card ends -->

   <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
       <div class="card">
        <div class="card-header flex-column align-items-start">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="users" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$customer_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total customer </b></p>
        </div>   
        <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
        <div class="progress-bar" role="progressbar" style="width: {{ $customer_count /2}}px" aria-valuenow="{{ $customer_count }}" aria-valuemin="0" aria-valuemax="100"> {{ $customer_count }}
        </div>
       </div>
       </div>
    </div>
    <!-- Subscribers Chart Card ends -->

    <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
       <div class="card">
        <div class="card-header flex-column align-items-start ">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="file-text" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$invoice_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Invoice</b></p>
          </div>   
      
          <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
          <div class="progress-bar" role="progressbar" style="width: {{ $invoice_count /2}}px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            {{ $invoice_count }}
         </div>
         </div>
   
       </div>
    </div>
    <!-- Subscribers Chart Card ends -->
    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12"  >
       <div class="card  pb-2">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-primary p-50 m-0"> 
            <div class="avatar-content">
                <i data-feather="file-text" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$sync_invoice_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Invoice Sync URA</b></p>
      
         <div class="progress" style="height: 15px;width: 100%;margin-left: 0%;">
        <div class="progress-bar" role="progressbar" style="width: {{ $sync_invoice_count}}px" aria-valuenow="{{ $sync_invoice_count }}" aria-valuemin="0" aria-valuemax="10">{{ $sync_invoice_count }}
        </div>
          <h2 class="fw-bolder mt-1">{{$retrun_count}}</h2>
              </div>  </div> 
        </div>
     </div>
    <!-- Orders Chart Card ends sync_retrun_count -->


    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12"  >
       <div class="card  pb-2">
        <div class="card-header flex-column align-items-start pb-1">
          <div class="avatar bg-light-primary p-50 m-0"> 
            <div class="avatar-content">
               <i data-feather="file-text" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$pending_invoice_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Pending Invoice </b></p>
        </div> 
         <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
        <div class="progress-bar" role="progressbar" style="width: {{ $pending_invoice_count}}px" aria-valuenow="{{ $pending_invoice_count }}" aria-valuemin="0" aria-valuemax="10">{{ $pending_invoice_count }}
        </div> 
          <h2 class="fw-bolder mt-1">{{$retrun_count}}</h2>
              </div>
        </div>
     </div>
    <!-- Orders Chart Card ends sync_retrun_count -->


    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12"  >
       <div class="card  pb-2">
        <div class="card-header flex-column align-items-start pb-1">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="credit-card" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$retrun_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Credit Note</b></p>
        </div> 
         <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
        <div class="progress-bar" role="progressbar" style="width: {{ $retrun_count}}px" aria-valuenow="{{ $retrun_count }}" aria-valuemin="0" aria-valuemax="10">{{ $retrun_count }}
        </div>
          <h2 class="fw-bolder mt-1">{{$retrun_count}}</h2>
              </div>
        </div>
     </div> 
    <!-- Orders Chart Card ends sync_retrun_count -->

    

     <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12"  >
       <div class="card  pb-2">
        <div class="card-header flex-column align-items-start pb-2">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="credit-card" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$sync_retrun_count}}</h2>
          <p class="card-text"><b style="font-size: 16px;">Total Credit Note Sync URA</b></p>
        </div> 
         <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
        <div class="progress-bar" role="progressbar" style="width: {{ $sync_retrun_count}}px" aria-valuenow="{{ $sync_retrun_count }}" aria-valuemin="0" aria-valuemax="10">{{ $sync_retrun_count }}
        </div>
          <h2 class="fw-bolder mt-1">{{$sync_retrun_count}}</h2>
              </div>
        </div>
     </div>
    <!-- Orders Chart Card ends sync_retrun_count -->



    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12"  >
       <div class="card  pb-2">  
        <div class="card-header flex-column align-items-start pb-2">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="credit-card" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$pending_retrun_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Pending Credit Note </b></p>
        </div> 
         <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
        <div class="progress-bar" role="progressbar" style="width: {{ $pending_retrun_count}}px" aria-valuenow="{{ $pending_retrun_count }}" aria-valuemin="0" aria-valuemax="10">{{ $pending_retrun_count }}
        </div>
          <h2 class="fw-bolder mt-1">{{$pending_retrun_count}}</h2>
              </div>
        </div>
     </div>
    <!-- Orders Chart Card ends sync_retrun_count -->

 <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
          <div class="avatar bg-light-warning p-50 m-0" >
            <div class="avatar-content">
              <i data-feather="box" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$stockadjustment_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Stock Adjustment </b></p>
        </div>
         <div class="progress"style="height: 15px;width: 95%;margin-left: 3%;" >
        <div class="progress-bar" role="progressbar" style="width: {{ $stockadjustment_count}}px" aria-valuenow="{{ $stockadjustment_count }}" aria-valuemin="0" aria-valuemax="10"> {{ $stockadjustment_count }}
        </div>
        </div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->

     <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
          <div class="avatar bg-light-warning p-50 m-0" >
            <div class="avatar-content">
              <i data-feather="box" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$sync_stockadjustment_count}}</h2>
          <p class="card-text"><b style="font-size: 16px;">Total Stock Adjustment Sync URA </b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div class="progress-bar" role="progressbar" style="width: {{ $sync_stockadjustment_count}}px" aria-valuenow="{{ $sync_stockadjustment_count }}" aria-valuemin="0" aria-valuemax="10"> {{ $sync_stockadjustment_count }}
            </div>
        </div>
       
        </div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->

    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
          <div class="avatar bg-light-warning p-50 m-0" >
            <div class="avatar-content">
              <i data-feather="box" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$pending_stockadjustment_count}}</h2>
          <p class="card-text"><b style="font-size: 16px;">Total Pending Stock Adjustment  </b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div class="progress-bar" role="progressbar" style="width: {{ $pending_stockadjustment_count}}px" aria-valuenow="{{ $pending_stockadjustment_count }}" aria-valuemin="0" aria-valuemax="10"> {{ $pending_stockadjustment_count }}
            </div>
        </div>
       
        </div>
      </div>
    </div>
    <!-- Orders Chart Card ends -->


    

  <!-- Greetings Card starts -->
    <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-2">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="clipboard" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$grn_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total GRN</b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div class="progress-bar" role="progressbar" style="width: {{ $grn_count  }}px" aria-valuenow="{{ $grn_count }}" aria-valuemin="0" aria-valuemax="10">
                {{ $grn_count }}
            </div>
        </div>
         
        </div>
      </div>
    </div>
    <!-- Subscribers Chart Card ends sync_grn_count-->

       <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="clipboard" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$sync_grn_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total GRN Sync URA </b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div class="progress-bar" role="progressbar" style="width: {{ $sync_grn_count  }}px" aria-valuenow="{{ $sync_grn_count }}" aria-valuemin="0" aria-valuemax="10">
                {{ $sync_grn_count }}
            </div>
        </div> 
       
        </div>
      </div>
    </div>
    <!-- Subscribers Chart Card ends sync_grn_count-->

    <!-- Subscribers Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="clipboard" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">{{$pending_grn_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Pending GRN  </b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div class="progress-bar" role="progressbar" style="width: {{ $pending_grn_count  }}px" aria-valuenow="{{ $pending_grn_count }}" aria-valuemin="0" aria-valuemax="10">
                {{ $pending_grn_count }}
            </div>
        </div> 
       
        </div>
      </div>
    </div>
    <!-- Subscribers Chart Card ends sync_grn_count-->
    <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
       <div class="card" style="height: 50% !importent">
        <div class="card-header flex-column align-items-start pb-0"> 
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="archive" class="font-medium-5"></i>
            </div>      
          </div>
          <h2 class="fw-bolder mt-1">{{$warehouse_opening_stock_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Opnening Stock</b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div  class="progress-bar" role="progressbar" style="width: {{ $warehouse_opening_stock_count /2}}px" aria-valuenow="{{ $warehouse_opening_stock_count }}" aria-valuemin="0" aria-valuemax="100">{{ $warehouse_opening_stock_count }}
         </div>
        </div>
        
        </div>
       </div>
    </div>
    <!-- Orders Chart Card ends -->
      <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
       <div class="card" style="height: 50% !importent">
        <div class="card-header flex-column align-items-start pb-2"> 
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="archive" class="font-medium-5"></i>
            </div>      
          </div>
          <h2 class="fw-bolder mt-1">{{$pending_warehouse_opening_stock_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Pending Opnening Stock</b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div  class="progress-bar" role="progressbar" style="width: {{ $pending_warehouse_opening_stock_count /2}}px" aria-valuenow="{{ $pending_warehouse_opening_stock_count }}" aria-valuemin="0" aria-valuemax="100">{{ $pending_warehouse_opening_stock_count }}
         </div>
        </div>
        
        </div>
       </div>
    </div>
    <!-- Orders Chart Card ends -->
    <!-- Orders Chart Card ends -->
      <!-- Orders Chart Card starts -->
    <div class="col-lg-3 col-sm-6 col-12">
       <div class="card" style="height: 50% !importent">
        <div class="card-header flex-column align-items-start pb-0"> 
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="archive" class="font-medium-5"></i>
            </div>      
          </div>
          <h2 class="fw-bolder mt-1">{{$sync_warehouse_opening_stock_count}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Total Sync Opnening Stock</b></p>
          <div class="progress" style="height: 15px;width: 100%;margin-left:0%;">
            <div  class="progress-bar" role="progressbar" style="width: {{ $sync_warehouse_opening_stock_count /2}}px" aria-valuenow="{{ $sync_warehouse_opening_stock_count }}" aria-valuemin="0" aria-valuemax="100">{{ $sync_warehouse_opening_stock_count }}
         </div>
        </div>
        
        </div>
       </div>
    </div>
    <!-- Orders Chart Card ends -->
  </div>
</section>

<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-invoice-list.js')) }}"></script>
@endsection
