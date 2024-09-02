
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
@if(Session::has('successMessage'))
			 <input id="toster_id" type="hidden" value="{{ Session::get('successMessage') }}">
			@elseif(Session::has('alertMessage'))
			 <input id="toster_id" type="hidden" value="{{ Session::get('alertMessage') }}">	
			@endif

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
   
     {{--  <div class="col-lg-3 col-sm-6 col-12">
    <div class="card">
        <div class="card-header flex-column align-items-start">
            <div class="avatar bg-light-primary p-50 m-0">
                <div class="avatar-content">
                    <!-- Add an icon here, for example using Font Awesome -->
                    <i class="fas fa-calendar-alt"></i>
                     
                </div>
            </div>
            <h2 class="fw-bolder mt-1">{{ucfirst($user)}} </h2>
            <p class="card-text"><b style="font-size: 17px;">08-02-2024</b></p>
        </div>
    </div>
</div>  --}}

 
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
          <h2 class="fw-bolder mt-1">{{$teamCount}}</h2>
          <p class="card-text"><b style="font-size: 17px;">Team </b></p>
        </div>   
        <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
        <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: {{ ($teamCount / 100) * 100 }}%;" aria-valuenow="{{ $teamCount }}" aria-valuemin="0" aria-valuemax="100">{{ $teamCount }}</div>
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
          <h2 class="fw-bolder mt-1">{{ $teamCount }}</h2>
          <p class="card-text"><b style="font-size: 17px;">Brand</b></p>
          </div>   
      
          <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
          <div class="progress-bar" role="progressbar" style="width: {{ ($teamCount / 100) * 100 }}%;" aria-valuenow="{{ $teamCount }}" aria-valuemin="0" aria-valuemax="100">{{ $teamCount }}</div>
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
          <h2 class="fw-bolder mt-1">{{ $teamCount }}</h2>
          <p class="card-text"><b style="font-size: 17px;">Media</b></p>
          </div>   
      
          <div class="progress" style="height: 15px;width: 95%;margin-left: 3%;">
          <div class="progress-bar" role="progressbar" style="width: {{ ($teamCount / 100) * 100 }}%;" aria-valuenow="{{ $teamCount }}" aria-valuemin="0" aria-valuemax="100">{{ $teamCount }}</div>
         </div>
   <div>. </div>
       </div>
    </div>
    <!-- Subscribers Chart Card ends -->
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
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    // Initialize Feather Icons
    feather.replace();
</script>
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