@extends('layouts/contentLayoutMaster')
@section('title', 'Compatible Devices')
@section('content')
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">


@if(Session::has('successMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('successMessage') }}">
@elseif(Session::has('alertMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('alertMessage') }}">
@endif
 <style>
  .example-image-link img {
         width: 78.9895px;  
         height: 63.9861px;
        object-fit: cover;  
    }
    
</style>
<!-- Basic Tables start -->
<div class="row" id="basic-table">
    <input type="hidden" name="" id="app_url" value="{{env('APP_URL')}}">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Compatible Devices</h4>
                <a href=" {{route('save-compatible-devices')}}"><button class="btn btn-primary">Sync</button></a>
               
            </div>
        </div>
    </div>
    <div class="card-body">
    </div>
    <div class="table-responsive">
        <table class="table" id="dataTableExample1">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Model</th>
                    <th>OS</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;?>
                @php $i = 1; @endphp
                @foreach($compatibleDevices as $user)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->model}}</td>
                    <td>{{$user->os}}</td>
                    <td>{{$user->brand}}</td>
                    <td>{{$user->name}}</td>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="view-compatible-devices/{{$user->id}}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-eye me-50">
                                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                  <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                    <span>View</span>
                                </a>

                                <a class="dropdown-item" href="delete-compatible-devices/{{$user->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M16 6v-4a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v4"></path>
                                        <path d="M21 9V21a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9"></path>
                                    </svg>
                                    <span>Delete</span>
                                </a>
                            </div>

                        </div>
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="card-body">
        <div class="demo-inline-spacing">
            <div class="form-modal-ex">
                <!-- Button trigger modal -->
            </div>
        </div>
    </div>
</div>
<!-- Basic Tables end -->

<link href="http://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-3.3.1.js"></script>

<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
    $('#dataTableExample1').DataTable({
        order: []
    });

</script>


@endsection

@section('page-script')
<!-- Page js files -->
<script src="jquery-3.6.4.min.js"></script>

@endsection
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
 