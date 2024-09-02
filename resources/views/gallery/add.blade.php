@extends('layouts/contentLayoutMaster')

    @section('title', 'gallary')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   @section('content')
  <style>
	label {
		font-size: 15px !important;
		font-weight: bold; 

	}
	input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<!-- Basic multiple Column Form section start -->

<section id="basic-vertical-layouts">
	<div class="row">
		<div class="col-md-12 col-12">
			<div class="card">
				<div class="card-header ">
					<h1 class="card-title" style="font-size:27px;"> {{ request()->route('id') ? 'Edit Gallery ' : 'Add Gallery ' }}  </h1>
				</div>
				<hr class="bold-line">
				<div class="card-body">
					<form class="form form-vertical" role="form" action="{{route('gallery-save')}}" method="post"
						enctype="multipart/form-data">
						@csrf
						<div class="row">   	
            @if(request()->route('id'))			
								<div class="col-6"> 
								<div class="mb-1">    
                <?php
                       $images = explode(',', $GalleryImages->Images);
                ?>
								 <label class="form-label" for="password-vertical">Image @if($GalleryImages->Images)
                    <a href="{{ asset('images/gallery/'.$images[0]) }}" class="example-image-link" data-lightbox="example-set">
                      show Image
                    </a>
                    @endif</label>
									<input type="file" id="Image" class="form-control" name="Image[]" placeholder="Image" multiple>
								</div>
							   </div>   
                 
              @else
              
              	<div class="col-6">
								<div class="mb-1">
									<label class="form-label " for="email-id-vertical"> Image <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
								  <input class="form-control" type="file" id="files" name="files[]" multiple />
								 
								</div>
							</div>
              @endif
            @if(request()->route('id'))			
								<div class="col-6"> 
								<div class="mb-1">    
								 <label class="form-label" for="password-vertical">Event </label>
									<input type="text" id="event" value="{{$GalleryImages->event}}"class="form-control" name="event"
										placeholder="event" >
								</div>
							   </div>   
                 
              @else
              
              	<div class="col-6">
								<div class="mb-1">
									<label class="form-label " for="email-id-vertical"> Event <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
								 <input type="text" id="event" class="form-control" name="event"
										placeholder="event" >
								 
								</div>
							</div>
              @endif
              @if(request()->route('id'))
             <div class="col-6">
                <div class="mb-1">
                  <label class="form-label" for="password-vertical">Status</label>
                  <select class="form-control" id="status" name="status">
                    <option value=""></option>
                    <option value="Active" {{ $GalleryImages->status == 'Active' ? ' selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $GalleryImages->status == 'Inactive' ? ' selected' : '' }}>Inactive</option>
                  </select>
                </div>
              </div>
               <input class="form-control" type="hidden" id="files"value="{{$GalleryImages->id}}" name="updated_id"  />
              @else
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
              @endif
              @if(request()->route('id'))
             
							<div id="imageContainer" style="border: 1px solid #ccc; padding: 10px; display:none;"></div>
							<div class="col-12 text-center mt-3">
								<!-- <a class="rte button main" id="submit" title="Submit" onclick="submitContent()">Save</a> -->
								<button type="submit"
									class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>
							</div>
               @else
               <div id="imageContainer" style="border: 1px solid #ccc; padding: 10px; display:none;"></div>
							<div class="col-12 text-center mt-3">
								<!-- <a class="rte button main" id="submit" title="Submit" onclick="submitContent()">Save</a> -->
								<button type="submit"
									class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
							</div>
               @endif
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
    $(document).ready(function() {
        $("#files").on("change", function(e) {
            var files = e.target.files;
            for (var i = 0; i < files.length; i++) {
                var f = files[i];
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var imageDiv = $("<div class='imageDiv' style='display: inline-block; margin-right: 10px; border: 1px solid #000; padding: 5px;'>");
                    var img = $("<img class='imageThumb' style='max-width: 100px; max-height: 100px;'>");
                    img.attr("src", e.target.result);
                    img.attr("title", f.name);
                    imageDiv.append(img);
                    $('#imageContainer').append(imageDiv);
                    $('#imageContainer').show();
                });
                fileReader.readAsDataURL(f);

                // Create hidden input fields to store file names
                var hiddenInput = $("<input type='hidden' class='hiddenInput' name='file[]'>");
                hiddenInput.val(f.name);
                $('#imageContainer').append(hiddenInput);
            }
        });

        // Remove image on click
        $(document).on("click", ".imageDiv", function() {
            $(this).remove();
            var fileName = $(this).find('.imageThumb').attr('title');
            $('.hiddenInput[value="' + fileName + '"]').remove();
        });
    });
</script>
