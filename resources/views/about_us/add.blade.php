@extends('layouts/contentLayoutMaster')

@section('title', 'About Us')
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
					<h1 class="card-title" style="font-size:27px;">About Us</h1>
				</div>
				<hr class="bold-line">
				<div class="card-body">
					<form class="form form-vertical" role="form" action="{{route('about-us-save')}}" method="post"
						enctype="multipart/form-data">
						@csrf
						<div class="row">   
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Title <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="text" id="title" class="form-control" name="title" placeholder="title" required>
								</div>
							</div>
							
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Image <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="file" id="Image" class="form-control" name="Image"
										placeholder="Image" required>
								</div>
							</div>
							
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="password-vertical">Status <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<select class="form-control" id="status" name="status" required>
										<option value=""></option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
									</select>
								</div>
							</div> 
							<div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Discription <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<textarea class="form-control" name="short_discription"
										id="short_discription" required></textarea>
								</div>
							</div>

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