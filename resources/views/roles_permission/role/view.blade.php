@extends('layouts/contentLayoutMaster')

@section('title', 'Award')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<style>
	label {
		font-size: 15px !important;
		font-weight: bold; 

	}
</style>
<!-- Basic multiple Column Form section start -->

<section id="basic-vertical-layouts">
	<div class="row">
		<div class="col-md-12 col-12">
			<div class="card">
				<div class="card-header ">
					<h1 class="card-title" style="font-size:27px;"> View Award</h1>
				</div>
				<hr class="bold-line">
				<div class="card-body">
					<form class="form form-vertical" role="form" action="{{route('awards-save')}}" method="post"
						enctype="multipart/form-data">
						@csrf
						<div class="row">   
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Title <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="text" id="title" class="form-control" value="{{$data->title}}"name="title" placeholder="title" readonly required>
								</div>
							</div>
							 
							{{--  <div class="col-6"> 
								<div class="mb-1">    
								 <label class="form-label" for="password-vertical">Image @if($data->image)
                    <a href="{{asset('images/awards/' . $data->image) }}" class="example-image-link" data-lightbox="example-set">
                      show Image
                    </a>
                    @endif</label>
									<input type="file" id="Image" class="form-control" name="Image"
										placeholder="Image" >
								</div>
							   </div>  --}}

                  <div class="col-6">
                <div class="mb-1">
                    <label class="form-label" for="password-vertical"> Image</label>
                </div>
                @if($data->image)
                <div class="mb-1">
                    <a href="{{ asset('images/awards/' . $data->image)}}" class="example-image-link" data-lightbox="example-set">
                        <img src="{{ asset('images/awards/' . $data->image)}}" alt="Logo Image" style="max-width: 100px;">
                    </a>
                </div>
                @endif
            </div>
                 
							 <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Year <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="text" value="{{$data->year}}" class="form-control" id="year" name="year"  placeholder="Year" required>
									
								</div>
							</div>
              <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Country <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="text" id="title" class="form-control" value="{{$data->country}}"name="country" placeholder="country" required readonly>
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="password-vertical">Status <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<select class="form-control" id="status" name="status" required disabled>
										<option value=""></option>
						   			<option value="Active" {{ $data->status == 'Active' ? 'selected' : '' }}>Active</option>
                   <option value="Inactive" {{ $data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>


									</select>
								</div>
							</div> 
							<div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Discription <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<textarea class="form-control" name="short_discription"
										id="short_discription" required readonly>{{$data->discription}}</textarea>
								</div>
							</div>
              <input type="hidden"value="{{$data->id}}" name="updated_id">

							<div class="col-12 text-center mt-3">
								<!-- <a class="rte button main" id="submit" title="Submit" onclick="submitContent()">Save</a> -->
								<button type="submit"
									class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection