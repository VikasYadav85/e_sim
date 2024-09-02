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
					<h1 class="card-title" style="font-size:27px;"> View Order</h1>
				</div>
				<hr class="bold-line">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="nav-item" role="presentation">
					  <button class="nav-link tabcolor active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Order</button>
					</li>
					<li class="nav-item" role="presentation">
					  <button class="nav-link tabcolor" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">User</button>
					</li>
					<li class="nav-item" role="presentation">
					  <button class="nav-link tabcolor" id="pills-package-countries-tab" data-bs-toggle="pill" data-bs-target="#pills-package-countries" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">SIM</button>
					</li>
				  </ul>

				  <div class="tab-content" id="pills-tabContent">

					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  <div class="card-body">
						 
						<div class="row">   
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Package ID </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->package_id : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Quantity </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->quantity : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Type </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->type : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Description </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->description : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Esim Type </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->esim_type : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Validity </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->validity : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Package </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->package : '' }}" placeholder=" " readonly> 
								</div>
							</div>

				  
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Data </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->data : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Price </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->price : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Code </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->code : '' }}" placeholder=" " readonly> 
								</div>
							</div>
  
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Currency </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Order) ? $Order->currency : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical"> Status  </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($Status) ? $Status->name : '' }}" placeholder=" " readonly> 
								</div>
							</div> 
					 
					
							<div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">Installation Guide (English)</label>
								 @if(isset($installationGuides['en']))
									<p>English Guide: <a href="{{ $installationGuides['en'] }}" target="_blank">{{ $installationGuides['en'] }}</a></p>
								@else
									<p>No guide available.</p>
								@endif
								</div>
							</div>
							
							<div class="col-6">
								<div class="mb-1">
									
									<label class="form-label" for="contact-info-vertical" style="font-size: 23px !important;">Qrcode Installation </label>
									 {!! $Order->qrcode_installation !!}
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical"style="font-size: 23px !important;">Manual Installation </label>
									 {!! $Order->manual_installation !!}
								</div>
							</div>

							<div class="col-12 text-center mt-3">
								<a href="{{ route('order-list') }}" class="btn btn-secondary me-1 waves-effect waves-float waves-light">Back</a>
							</div>

						 </div>

					  </div>
					</div>
		  



					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="card-body">
					 

						<div class="row">   
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Name </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->name : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Email </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->email : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Mobile </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->mobile : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Address </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->address : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	State </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->state : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Package ID </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->package_id : '' }}" placeholder=" " readonly> 
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	City </label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->city : '' }}" placeholder=" " readonly> 
								</div>
							</div>

							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="contact-info-vertical">	Postal Code</label>
									<input type="text" id="title" class="form-control" name="name" value="{{ isset($EsimUser) ? $EsimUser->postal_code : '' }}" placeholder=" " readonly> 
								</div>
							</div>

						</div>

                          <div class="col-12 text-center mt-3">
								<a href="{{ route('order-list') }}" class="btn btn-secondary me-1 waves-effect waves-float waves-light">Back</a>
							</div>
					</div>
					</div>
		  

					<div class="tab-pane fade" id="pills-package-countries" role="tabpanel" aria-labelledby="pills-package-countries-tab">
						 
					 
						<div class="card-body">
							<div class="table-responsive">
							  <table class="table" id="dataTableExample1">
								  <thead>
									  <tr>
										  <th>Sr No.</th>
										  <th>ICCID</th>
										  <th>LPA</th>
										  <th>IMSIS</th>
										  <th>Matching Id</th>
										  <th>Qrcode</th>
										  <th>Qrcode Url</th>
										  <th>Airalo Code</th>
										  <th>Apn Type</th>
										  <th>Apn Value</th>
										  <th>Is Roaming</th>
									  </tr>
								  </thead>  
								 <tbody>
									@foreach ($Simsa as $key => $Sims)
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>{{$Sims->iccid}}</td>
										<td>{{ $Sims->lpa}}</td>
										<td>{{ $Sims->imsis }}</td>
										<td>{{ $Sims->matching_id }}</td>
										<td>{{ $Sims->qrcode }}</td>
										<td>{{ $Sims->qrcode_url}}</td>
										<td>{{ $Sims->airalo_code}}</td>
										<td>{{ $Sims->apn_type}}</td>
										<td>{{ $Sims->apn_value}}</td>
										<td>{{ $Sims->is_roaming}}</td>
									</tr>
									@endforeach


								  </tbody>
							  </table>
							  </div>
							  	 
							<div class="col-12 text-center mt-3">
								<a href="{{ route('order-list') }}" class="btn btn-secondary me-1 waves-effect waves-float waves-light">Back</a>
							</div>
							</div>
						
	
							 
		  
				  </div> 

				
			</div>
		</div>
	</div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection