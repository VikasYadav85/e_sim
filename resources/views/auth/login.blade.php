@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')
@section('title', 'Login Page')
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection
@if(Session::has('successMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('successMessage') }}">
@elseif(Session::has('alertMessage'))
<input id="toster_id" type="hidden" value="{{ Session::get('alertMessage') }}">
@endif
@section('content')
<div class="auth-wrapper auth-cover">
  <div class="auth-inner row m-0">
    <!-- Brand logo-->
    <a class="brand-logo" href="#">
      <img src="{{ asset('assetss/imgs/logo.png') }}" alt="" class="ft-logo" />

      {{--  <h2 class="brand-text text-primary ms-1">Hariss International Website</h2>  --}}
    </a>
    <!-- /Brand logo-->

    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
      <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
        @if($configData['theme'] === 'dark')
          <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
          @else
          <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
          @endif
      </div>
    </div>
    <!-- /Left Text-->
    <!-- Login-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">Welcome to E-sim </h2>
        <form class="auth-login-form mt-2" action="{{route('login-check')}}" method="POST">
            @csrf
          <div class="mb-1">
            <label class="form-label" for="login-email">Email</label>
            <input class="form-control" id="login-email" type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" required/>
            @if($errors->any() && $errors->first() == 'Invalid Email')

            <span class="text-danger">{{$errors->first()}}</span>
            @endif
          </div>
          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Password</label>

            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" required/>
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
            @if($errors->any() && $errors->first() == 'Invalid Password')
            <span class="text-danger">{{$errors->first()}}</span>
            @endif
          </div>

          {{--  <a href="{{('signup')}}" class="forgot-password">Don't have an account? Signup</a>  --}}
         {{--  &nbsp;  --}}
      <div class="col">
      <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
       {{--  <a href="{{('forget')}}" class="forgot-password"style="margin-left:66%;">Forget Password ?</a>  --}}
    </div>
        </form>

      </div>
    </div>
    <!-- /Login-->
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>
@endsection
<!-- Include jQuery before other scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your custom script -->
<script src="{{ asset('admin/js/script.js') }}"></script>

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
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
