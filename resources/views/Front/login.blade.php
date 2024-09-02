<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Login</title>
  <link rel="icon" type="image/x-icon" href="assets11/imgs/favicon.ico">

  <link href="assets1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets1/css/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets1/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>

<body>

  <section class="login-wrapper">
    <div class="center-box">
      <div class="form-box">
        <h2 class="section-title mb-3 text-center text-uppercase mb-lg-4 pb-lg-2">
          Login
        </h2>
        <form action="" id="registerForm">
          @csrf
          <div class="form-group mb-3">
                       <input type="email"name="email" id="emailInput" placeholder="Enter Email" class="form-control">
             <span id="emailError" style="display: none; color: red;">Email is invalid</span>
          </div>
          
             <span id="email11"></span>
          <div class="form-group mb-3 position-relative">
             <input type="password" name="password" id="passInput" placeholder="Enter Password" class="form-control">
            <p class="eye-icon">
              <img src="assets1/imgs/eye-close.png" id="togglePassword" style="cursor: pointer;">
            </p>
                        <span id="passError" style="display: none; color: red;">Password is invalid</span>

          </div>
          <div class="text-end">
            <a href="" class="details-text">
              Forgot Password?
            </a>
          </div>
         
        </form>
         <div class="text-center mt-4">
            <button  id="submit" class="btn btn-default shadow">
              Login Now
            </button>
          </div>
        <div class="devider mt-2">
          <div>
            Login <span>with Others</span>
          </div>
        </div> 
        <a  href="auth/google/callback"class="social-btn">
          <img src="assets1/imgs/google-2.png" alt="">
          Login With <span>Google</span>
        </a>
        <a href="{{ route('login.facebook') }}" class="social-btn">
          <img src="assets1/imgs/facebook-2.png" alt="">
          Login With <span>Facebook</span>
        </a>
        <button class="social-btn">
          <img src="assets1/imgs/apple-logo.png" alt="">
          Login With <span>Apple</span>
        </button>
        <div class="bottom-links">
          DO NOT HAVE AN ACCOUNT?  
          <a href="signup">SIGN UP FOR FREE</a>
        </div>
      </div>
    </div> 
    <img src="assets1/imgs/log-img.png" class="login-banner d-none d-lg-block">
  </section>

  <script src="assets1/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/js/swiper-bundle.min.js"></script>
  <script src="assets1/js/jquery.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="assets1/js/js.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
   <script>
    $(document).ready(function() {

     $('#togglePassword').click(function() {
        var passwordField = $('#passInput');
        var fieldType = passwordField.attr('type'); 
        if (fieldType === 'password') {
            passwordField.attr('type', 'text');
            $('#togglePassword').attr('src', 'assets1/imgs/eye-open.svg'); 
        } else {
            passwordField.attr('type', 'password');
            $('#togglePassword').attr('src', 'assets1/imgs/eye-close.png'); 
        }
    });


            $('#submit').on('click', function(event) {
             var formdata = $("#registerForm").serialize()
                event.preventDefault();
                $.ajax({
                    url: 'login-user',
                    method: 'post',
                     data: formdata,
                     success: function(response) {
                      
 
                    window.location.replace('home');
                    },  
                    
                  error: function(xhr) {
                       if(xhr.responseJSON.message != 'Email'){ $('#emailError').hide();}
                       if(xhr.responseJSON.message != 'Password'){ $('#passError').hide();}

                    if(xhr.responseJSON.message == 'Email')
                    {
                    
                      $('#emailError').show();}
                    else{
                    
                      $('#passError').show();}
            }
                });
            });
            
        });
    </script>

</body>

</html>