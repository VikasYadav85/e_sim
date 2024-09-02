@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'OTP  Page')

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
            <img src="{{ asset('assets/imgs/logo.png') }}" alt="" class="ft-logo" />

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
    <div class=" col-lg-4 align-items-center auth-bg px-2 p-lg-5"  id="otpvaliddiv"> 
    


      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">OTP Validation </h2>
        <form class="auth-login-form mt-2" action="{{route('validation')}}" method="POST">
            @csrf
          <div class="mb-1">
            <label class="form-label" for="login-email">OTP</label>
            <input class="form-control"  value="" type="text" id="otp_id"name="otp_id" placeholder="OTP" aria-describedby="login-email" autofocus="" tabindex="1" required/>
            @if($errors->any() && $errors->first() == 'Invalid Email')
            
            <span class="text-danger">{{$errors->first()}}</span>
            @endif
          </div>
      <div class="col">
      
    </div>
        </form>
        <button type="submit1" onclick="myFunction()" class="btn btn-primary w-100" tabindex="4">Verify</button>





      </div>
    </div>
   
    <!-- /Login-->

    <!--  NEW PASSWORD-->
    
    <!-- Login-->
    <div class=" col-lg-4 align-items-center auth-bg px-2 p-lg-5" style="display: none;" id="newpassdiv"> 
      
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title fw-bold mb-1">New Password </h2>
        <form class="auth-login-form mt-2" action="{{route('validation')}}" method="POST">
            @csrf
            <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">New Password</label>
               <input type="hidden" value="" id="email" name="email">
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" onkeyup="chackpass()" required/>
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
            @if($errors->any() && $errors->first() == 'Invalid Password')
            <span class="text-danger">{{$errors->first()}}</span>
            @endif
          </div>
          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">confirm Password</label>
              
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input class="form-control form-control-merge" id="confirmPassword" type="password" name="confirmPassword" placeholder="············" aria-describedby="login-password" tabindex="2" onkeyup="chackpass()" required/>
              <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
            @if($errors->any() && $errors->first() == 'Invalid Password')
            <span class="text-danger">{{$errors->first()}}</span>
            @endif
          </div>
          <span id="passwordMatchMessage"></span>
      <div class="col">
  
    </div>
        </form>
        <button type="submit" id="newid" onclick="newFunction()"  class="btn btn-primary w-100" tabindex="4">Submit</button>






      </div>
    </div>
   
    <!-- /Login-->

    
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/script.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript">


function myFunction() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var otp=$('#otp_id').val();
        var formData = new FormData();
        formData.append("otp_id", $('#otp_id').val());
         $.ajax({
          
            url: "{{URL('/validation')}}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false, 
            success: function(response) {
              console.log(response.error);
              $('#email').val(response.email);
              $("#newpassdiv").show();
              $("#otpvaliddiv").hide();
            },
            error: function(xhr, status, error) {
              Swal.fire({
            icon: 'warning',
            title: 'Please enter valid OTP',
            showConfirmButton: false,
            timer: 2000
       })
       window.location.replace("{{URL('/otp_validation')}}");
}
        });
} ;

function newFunction() {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var password=$('#password').val();
    var email=$('#email').val();
    
    var confirmPassword=$('#confirmPassword').val();
        var formData = new FormData();
        formData.append("password", $('#password').val());
        formData.append("confirmPassword", $('#confirmPassword').val());
        formData.append("email", $('#email').val());
        
         $.ajax({
          
            url: "{{URL('/new_password')}}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false, 
            success: function(response) {
              Swal.fire({
			 
                icon: 'success',
                title: 'Password Updated Successfully',
                showConfirmButton: false,
                timer: 1000
                })
                window.location.replace("{{URL('/login')}}");
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
} ;
  

//

function chackpass() {
    // Accessing input elements
    var confirmPasswordInput = document.getElementById('password');
    var newPasswordInput = document.getElementById('confirmPassword');
    var confirmPassword = confirmPasswordInput.value;
    var newPassword = newPasswordInput.value;

    if (newPassword === confirmPassword) {
      passwordMatchMessage.innerText = 'Password match';
        passwordMatchMessage.style.color = 'green';
       
        $('#newid').prop('disabled', false);

    } else {
     
      passwordMatchMessage.innerText = 'Password do not match';
        passwordMatchMessage.style.color = 'red'; 
        $('#newid').prop('disabled', true);

    }
    }
//
var jq = $.noConflict();
jq(document).ready(function(){

	@if(Session::has('successMessage'))
			var toster=jq('#toster_id').val();
			if(toster!=''){
			Swal.fire({
			 
			icon: 'success',
			title: ''+toster,
			showConfirmButton: false,
			timer: 5000
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