<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esim - Register</title>
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
          Register
        </h2>
        <form  method="post" enctype="multipart/form-data" id="registerForm">
           @csrf
          <div class="form-group mb-3">
            <input type="email"name="email" id="email" placeholder="Enter Email" class="form-control">
          </div>
        <div class="form-group mb-3 position-relative">
    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
    <p class="eye-icon">
        <img src="assets1/imgs/eye-close.png" id="togglePassword" style="cursor: pointer;">
    </p>
</div>
          <div class="text-end">
            <a href="" class="details-text">
              Forgot Password?
            </a>
          </div>
        
        </form>
          <div class="text-center mt-4">
            <button  id="submit" class="btn btn-default shadow">
              Register
            </button>
          </div>
        <div class="devider mt-2">
          <div>
            Login <span>with Others</span>
          </div>
        </div>
        <button class="social-btn">
          <img src="assets1/imgs/google-2.png" alt="">
          Login Width <span>Google</span>
        </button>
        <button class="social-btn">
          <img src="assets1/imgs/facebook-2.png" alt="">
          Login Width <span>Facebook</span>
        </button>
        <button class="social-btn">
          <img src="assets1/imgs/apple-logo.png" alt="">
          Login Width <span>Apple</span>
        </button>
        <div class="bottom-links">
          already HAVE AN ACCOUNT?
          <a href="login">SIGN IN FOR FREE</a>
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
        var passwordField = $('#password');
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
                    url: 'register',
                    method: 'post',
                     data: formdata,
                     success: function(response) {
                    window.location.replace('home');
                    },
                  error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.email) {
                    let errorMessage = xhr.responseJSON.message.email[0];
                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
                });
            });
            
        });
    </script>

</body>

</html>