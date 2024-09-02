@extends('layouts/contentLayoutMaster')

@section('title', 'User')
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
					<h1 class="card-title" style="font-size:27px;">User</h1>
				</div>
				<hr class="bold-line">
				<div class="card-body">
					<form class="form form-vertical" role="form" action="{{route('user-store')}}" method="post"
						enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Name <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="text" id="title" class="form-control" name="name" placeholder="Name" required>
								</div>
							</div>
                            <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Role <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <select class="form-control" name="roles[]" id="" value="" required="">
                                        <option>Selete Role</option>
                                        @foreach ($Role as $roles)
                                        <option value="{{$roles->name}}">{{$roles->name}}</option>

                                        @endforeach
                                    </select>
								</div>
							</div>
                            <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Email <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="email" id="Email" class="form-control" name="email" placeholder="Email" required>
								</div>
							</div>

                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password">Password <b style="color:red; font-size: 18px; font-weight:bold;">*</b></label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" required />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    @if($errors->any() && $errors->first() == 'Invalid Password')
                                        <span class="text-danger">{{$errors->first()}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Contact Numbar <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="numbar" id="contact_number" class="form-control" name="contact_number" placeholder="contact_number" required>
								</div>
							</div>
                            {{--  <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Gender <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <select class="form-control" name="Gender" id="Gender" required="">
                                        <option> </option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>

                                    </select>
								</div> 
							</div>  --}}

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Image </label>
									<input type="file" id="Image" class="form-control" name="Image"
										placeholder="Image" >
								</div>
							</div>


							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="password-vertical">Status <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<select class="form-control" id="status" name="status" required>
										<option value=""></option>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>
							</div>
							{{--  <div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Address <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<textarea class="form-control" name="short_discription"
										id="short_discription" required></textarea>
								</div>
							</div>  --}}

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
