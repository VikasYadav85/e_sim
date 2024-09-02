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
					<h1 class="card-title" style="font-size:27px;">Edit User</h1>
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
									<input type="text" id="title" value="{{$user->name}}" class="form-control" name="name" placeholder="Name" required>
								</div>
							</div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Role <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <select class="form-control" name="roles[]" id="roles" required >
                                        <option>Select Role</option>
                                        @foreach ($Role as $role)
                                            <option value="{{ $role->name }}" {{ in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Email <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<input type="email" id="Email" value="{{ $user->email }}" class="form-control" name="email" placeholder="Email" required>
								</div>
							</div>
                            <input type="hidden" id="Email" value="{{ $user->id }}" class="form-control" name="update_id" placeholder="Email" required>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label class="form-label" for="password">Password <b style="color:red; font-size: 18px; font-weight:bold;">*</b></label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge"  value="" id="password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2"   />
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
									<input type="numbar" id="contact_number" value="{{ $user->contact_number }}" class="form-control" name="contact_number" placeholder="contact_number" required>
								</div>
							</div>
                            {{--  <div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Gender <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <select class="form-control" name="Gender" id="Gender" required="">
                                        <option> </option>
                                  <option value="Male"{{ $user->gender == 'Male' ? 'selected' : '' }} >Male</option>
                                  <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                  <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>

                                    </select>
								</div>
							</div>  --}}

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Image @if($user->image)<a href="{{asset('images/user_image/' . $user->image) }}" class="example-image-link" data-lightbox="example-set">
                                        show Image
                                      </a> @endif</label>
									<input type="file" id="Image" value="{{ $user->image }}" class="form-control" name="Image"
										placeholder="Image" >
								</div>
							</div>


							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="password-vertical">Status <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<select class="form-control" id="status" name="status" required>
										<option value=""></option>
										<option value="1" {{ $user->status == '1' ? 'selected' : '' }} >Active</option>
										<option value="0"{{ $user->status == '0' ? 'selected' : '' }}>Inactive</option>
									</select>
								</div>
							</div>
							{{--  <div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="email-id-vertical"> Address <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
									<textarea class="form-control" name="short_discription"
										id="short_discription" required>{{ $user->designation }}</textarea>
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
