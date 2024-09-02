@php
$current_page = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];
$current_url = Route::current()->getName();
@endphp  
                                  
@php 
   $current_page1 = explode('/', str_replace('?', '/',$current_page)); 
@endphp 
<!doctype html>
<html lang="en">

<head>
  <style>
    .float-container {
     }
  .float-child {
    width: 46%;
    float: left;
    padding: 20px;
	 
   }
   
   .float-container2 {
      border: 3px solid #fff;
       padding: 20px;
     }

  .float-child2 {
     width: 40%;
     float: left;
     border: 1px solid ;
   }
   .order{
	margin:50px -50px 50px -50px;
   }
   .table-bordered {
	
    table-layout: fixed;
	width:100%;
	  border-collapse: collapse;  
    word-wrap:break-word;   
	 
	   }
 
  </style>   
</head>
<body>
        
		 <table style="border-collapse: collapse; width:105%; margin: 0px 5px 2px -29px;" border="1px solid">  
			 <tr>    
			 <td style="padding:22px; font-size:15px;">
			 <div class="col-12">
				<div class="col-md-6 row">
				<center> <h2 style="margin-top: -15px;"> Credit Note</h2> 
				</div>
				      
	        </div>
			  </td> 
         </tr>        
			                 
		 </table>    
	        
      <table style="border-collapse: collapse; width:105%; margin: -5px 5px 2px -29px" border="1px solid"> 
    	<tr>  
			<td style="width: 52.2%;"> 
				<table style="border-collapse: collapse; width:100%;"> 
				<tr>
					<th style="font-size:13px; text-align: left;">DT Name :</th>
				   <td style="font-size:13px; width:61%;">{{$data->DTName}}</td>
				 </tr>

				<tr>
					<th style="font-size:13px; text-align: left;"> DT GST Number :</th>
					<td style="font-size:13px; width:61%;">{{$data->DTGSTNumber}} </td>
				</tr>
				<tr>
					<th style="font-size:13px; text-align: left;"> Customer Name :</th>
					<td style="font-size:13px; width:61%;"> {{$data->CustName}} </td>
				 </tr>
				 <tr>
				
					<th style="font-size:13px; text-align: left;">Refrence Number :</th>
					<td style="font-size:13px; width:61%;"> {{$data->efris_return_refrence_no}} </td>
				 </tr>
				 <tr>
					<th style="font-size:13px; text-align: left;">Invoice FDN Number :</th>
					<td style="font-size:13px; width:61%;"> {{$data->ura_invoiceNo}} </td>
				 </tr>

				 <tr>
					<th style="font-size:13px; text-align: left;">Credit Note FDN Number :</th>
					<td style="font-size:13px; width:61%;"> {{$data->credit_note_ura_invoiceNo}} </td>
				 </tr> 
				 <tr>
					<th style="font-size:13px; text-align: left;"> Verification Code :</th>
					<td style="font-size:13px; width:61%;"> {{$data->credit_note_ura_antifakeCode}} </td>
				 </tr>
			 
				</table>                
			</td>                 
			 
		  </tr>
		</table>	

		 	@php $space= '' ; @endphp
		<table class="table table-bordered " style="width:105%; margin: -5px 5px 2px -29px;" border="1px solid" >
		<thead>
			<tr>
				<th style="width:2%; text-align: center; font-size: 13px; background-color: #dfe2e8;">S.No </th>
				<th style="width:5%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Item Code</th>
				<th style="width:11%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Item Description</th>
				<th style="width:3%; text-align: center; font-size: 13px; background-color: #dfe2e8;">  UOM </th>
				<th style="width:5%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Qty</th> 
				<th style="width:4%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Price</th>
				<th style="width:4%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Discount</th>
				<th style="width:4%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Tax</th>
				<th style="width:4%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Net Amount</th>
				<th style="width:4%; text-align: center; font-size: 13px; background-color: #dfe2e8;">Gross Amount</th>
			</tr>    
		</thead>  
		<tbody id="dynmic_row"  > 
		@foreach($data1 as $key=>$details)
		    <tr id="row_0">
				<td style="font-size:12px; text-align: center; border-right: 2px solid #ffffff00;" >{{$key+1}}</td>
				<td class="col" style=" font-size:12px; text-align: center; border-right: 2px solid #ffffff00;" id="mitem_0">
				<label type="text" id="get_material_0" name="material_name[]" class="lget_material font-weight-bold ml-2" value ="" required="" readonly>{{$details->ItemCode}}  </label>
				</td>
				<td style=" font-size:12px; text-align: left; border-right: 2px solid #ffffff00;" id="mitem_0">
				<label type="text" id="get_material_0" name="material_name[]" class="lget_material font-weight-bold ml-2" value ="" required="" readonly>{{$details->ItemDescription}}  </label>
				</td> 			
				<td id="uitem_0"   style=" font-size:12px; text-align: center; border-right: 2px solid #ffffff00;">
				<label  id="uom_0" name="uom[]" class=" font-weight-bold ml-2" readonly>{{$details->UnitsOfMeasure}}</label>
				</td>				
				<td id="pitem_0" style=" font-size:12px; text-align: center; border-right: 2px solid #ffffff00;">
				<label value="" readonly id="price_0" type="text" name="quantity[]" class=" font-weight-bold ml-2">{{$details->ItemQuantity}}</label> 
				</td>		
				<td id="ditem_0" style=" font-size:12px; text-align: center; border-right: 2px solid #ffffff00;">
				<label value="" readonly id="discount_0" type="text" name="price[]" class=" font-weight-bold ml-2">{{number_format($details->ItemPrice,2)}}</label> 
				</td>			
				<td id="vitem_0" style=" font-size:12px; text-align: center; border-left:2px solid #ffffff00">
				<label value="" readonly id="vat_0" type="text" name="discount[]" class=" font-weight-bold ml-2" required="">{{number_format($details->TotalDiscountAmount,2)}}</label> 
				</td> 
				<td id="vitem_0" style=" font-size:12px; text-align: center; border-left:2px solid #ffffff00">
				<label value="" readonly id="vat_0" type="text" name="discount[]" class=" font-weight-bold ml-2" required="">{{number_format($details->TotalTaxAmount,2)}}</label> 
				</td> 
				<td id="vitem_0" style=" font-size:12px; text-align: center; border-left:2px solid #ffffff00">
				<label value="" readonly id="vat_0" type="text" name="discount[]" class=" font-weight-bold ml-2" required="">{{number_format($details->TotalNetAmount,)}}</label> 
				</td> 
				<td id="vitem_0" style=" font-size:12px; text-align: center; border-left:2px solid #ffffff00">
				<label value="" readonly id="vat_0" type="text" name="discount[]" class=" font-weight-bold ml-2" required="">{{number_format($details->GrossAmount,2)}}</label> 
				</td> 
				 
	        </tr> 
		   @endforeach
		   <tr> 
			<td style="padding: 11px; border-right: 2px solid #ffffff00;"></td> 
			<td style="border-right: 2px solid #ffffff00;" ></td>
			<td style="border-right: 2px solid #ffffff00;" ></td>
			<td style="border-right: 2px solid #ffffff00;" > </td> 
			<td style="border-right: 2px solid #ffffff00;"></td>
			<td style="border-right: 2px solid #ffffff00;"></td>
			<td style="border-left: 2px solid #ffffff00;"> </td> 
			<td style="border-left: 2px solid #ffffff00;"> </td>
			<td style="border-left: 2px solid #ffffff00;"> </td>
			<td style="border-left: 2px solid #ffffff00;"> </td>
			 
          	</tr>
		  </tbody>
        </table>

		<table style="border-collapse: collapse; width:105%; margin: -3px  0px 5px -29px;" border="1px solid" > 
		 <tr> 
		   <table style="border-collapse: collapse; width:40%; margin: -1px -2px -1px -29px; float:right;" border="1px solid" >  
		   @php
		$space=" ";
		@endphp 
		<tr>
		  
		  <th class="bg-faded" style="width: 50%; background-color: #dfe2e8; padding:3px; font-size: 12px; text-align: left;"> Net Amount </th>
		  <td style="width: 50%; padding:3px; font-size:12px; text-align: right;"> <span class="font-weight-bold ml-1" id="discount_amount_total"></span>{{$space}} {{number_format($data->TotalNetAmount,2)}}</td>
		</tr>
 
		  <tr>
		 
            <th class="bg-faded" style="width: 50%; background-color: #dfe2e8; padding:3px; font-size: 12px; text-align: left;"> Tax
              </th>
            <td id="vat_amount_total"  style="width: 50%; padding:3px; font-size:12px; text-align: right;">{{$space}} {{number_format($data->TotalTaxAmount1,2)}}</td>
          </tr>  
          <tr>
		 
            <th class="bg-faded" style="width: 50%; background-color: #dfe2e8; padding:3px; font-size: 12px; text-align: left;"> Discount
              </th>
            <td id="vat_amount_total"  style="width: 50%; padding:3px; font-size:12px; text-align: right;">{{$space}} {{number_format($data->TotalDiscountAmount,2)}}</td>
          </tr>  
		  <tr> 			 
            <th  class="bg-faded" style="width: 60%; background-color: #dfe2e8; padding:2px;  font-size: 12px; text-align: left;"> Gross Amount  </th>
            <td id="gross_amount_total" style="width: 50%; padding:2px; font-size: 12px; text-align: right;"> {{$space}} {{number_format($data->TotalAssessmentAmount,2)}}</td>
          </tr>
		  
     </table>  

	 </tr> 

		<tr> 
		<div class="col-12">                                      
				<div class="col-md-6 " style="margin:30px 0px 53px 300px ">			
					<img  src=""   alt=""  height="100.px" width="100px">
				</div>
			</div>
		</tr> 
		
		</table> 
		@if(!empty($data->credit_note_qr_code))
		<table style="border-collapse: collapse; width:105%; margin: -5px 5px 2px -29px; " border="0px solid">  
			 <tr> 
			
			 <td>	
				<div class="col-12">                                      
					<div class="col-md-6 " style="margin:35px 0px 35px 300px ">			
						<img  src="http://{{$host}}/{{$current_page1[1]}}/storage/app/public/{{$file_path}}"   alt=""  height="100.px" width="100px">
					</div>
				</div>	
			 </td>
			  </tr>  
	 </table> 
	 @endif
</body>     
</html>   
 
 