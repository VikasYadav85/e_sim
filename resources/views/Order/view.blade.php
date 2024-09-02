@extends('layouts/contentLayoutMaster')

@section('title', 'Order')
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
					<h1 class="card-title" style="font-size:27px;"> View Top Up Order</h1>
				</div>
				<hr class="bold-line">
				<div class="card-body">
					<form class="form form-vertical" role="form" action=" " method="post"
						enctype="multipart/form-data">
						@csrf

						<div class="row">   
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Package ID </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->package_id : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Quantity </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->quantity : '' }}" placeholder=" " readonly> 
								</div>
							</div><div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Type </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->type : '' }}" placeholder=" " readonly> 
								</div>
							</div><div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Description </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->description : '' }}" placeholder=" " readonly> 
								</div>
							</div><div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Esim Type </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->esim_type : '' }}" placeholder=" " readonly> 
								</div>
							</div><div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Validity </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->validity : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Package </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->package : '' }}" placeholder=" " readonly> 
								</div>
							</div>

				  
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Data </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->data : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Price </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->price : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Code </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->code : '' }}" placeholder=" " readonly> 
								</div>
							</div>


							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Currency </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->currency : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Manual Installation </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->manual_installation : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Manual Installation </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->manual_installation : '' }}" placeholder=" " readonly> 
								</div>
							</div>
						 
 
						<div class="col-12">
    <div class="mb-1">
        <label class="form-label" for="contact-info-vertical">Installation Guide (English)</label>
        @if(isset($TopupOrders->installation_guide_en['en']) && !empty($TopupOrders->installation_guide_en['en']))
            <textarea class="form-control" readonly>{{ $TopupOrders->installation_guide_en['en'] }}</textarea>
            <a href="{{ $TopupOrders->installation_guide_en['en'] }}" target="_blank" class="btn btn-primary mt-2">View Installation Guide</a>
        @else 
            <textarea class="form-control" readonly>No installation guide available in English</textarea>
        @endif
    </div>
</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">ID</label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->ids : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Created at</label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($TopupOrders) ? $TopupOrders->created_at : '' }}" placeholder=" " readonly> 
								</div>
							</div>
						 

							<div class="col-12 text-center mt-3">
								<a href="{{ route('top-up-order-list') }}" class="btn btn-secondary me-1 waves-effect waves-float waves-light">Back</a>
							</div>
							
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection