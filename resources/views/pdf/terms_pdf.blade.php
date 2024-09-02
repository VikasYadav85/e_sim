<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <style>
    </style>
</head>
<body>
    <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="img-fluid">
    <section class="py-4 py-lg-5 latest-content-section">
        <div class="container">
            <div class="accordion-body">
             <p>Version: {{ $data->created_at->format('F Y') }}</p>
                <div class="d-flex align-items-center flex-wrap justify-content-between mb-3">
                    <h2 class="section-title">Harris Terms Of Use</h2>
                </div>
                      <div>    
              {!! $data->discription!!}
          </div>
            </div>
        </div>
    </section>
</body>
</html>
