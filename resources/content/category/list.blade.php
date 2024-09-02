@extends('layouts/contentLayoutMaster')

@section('title', 'Rewards')

@section('content')
<!-- Basic Tables start -->
<div class="row" id="basic-table">
<input type="hidden" name="" id="app_url" value="{{env('APP_URL')}}">

  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Rewards List</h4>
       
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
          Add
        </button>


      </div>
      </div>
      <div class="card-body">

      </div>
      <div class="table-responsive">
        <table class="table" id="dataTableExample1">
          <thead>
            <tr>
             
             
              <th>S/N</th>
              <th>Rewards Code</th>
              <th>Rewards Value</th>
              <th>Phone No</th>
              <th>Expiry Date</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1;?>

            @php $i = 1; @endphp
            @foreach($coupons as $coupon)
            <tr>

            
            <td><span class="badge rounded-pill  badge-light-secondary me-1">  {{$i}}</span>
            </td>
              <td>
              <span class="badge rounded-pill  badge-light-success me-1">{{$coupon->coupon_code}}</span>
              </td>
              <td>
              <span class="badge rounded-pill  badge-light-success me-1">{{$coupon->coupon_value}}%</span>

              </td>
              <td>{{$coupon->phoneno}}</td>

              <td>
              <span class="badge rounded-pill  badge-light-danger me-1">{{$coupon->expiry_date}}</span>
              </td>
             
              <td>
                @if($coupon->status == 0)
                <span class="badge rounded-pill  badge-light-primary me-1">Pending</span>
                @else
                <span class="badge rounded-pill  badge-light-secondary me-1">Redeemed</span>
                @endif
              </td>
            </tr>
            <?php $i++ ?>
        @endforeach

          </tbody>
        </table>
      </div>

      <div class="card-body">
          <div class="demo-inline-spacing">
            <div class="form-modal-ex">
              <!-- Button trigger modal -->

              <!-- Modal -->
              <div
                class="modal fade text-start"
                id="inlineForm"
                tabindex="-1"
                aria-labelledby="myModalLabel33"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title text-primary" id="myModalLabel33">Send Rewards Code Link</h4>
                      <button type="button" id="close-btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    
                      <div class="modal-body">
                        <label>Enter Number : </label>
                        <div class="mb-1">
                          <input type="number" id="number" placeholder="" class="form-control" />
                          <span id="number_span" class="text-danger"></span>
                        </div>
                      </div>
                      <div class="modal-body">
                        <div class="mb-1">
                          <input type="hidden" id="type_ids" placeholder="" value="1" class="form-control" />
                          <!-- <span id="number_span" class="text-danger"></span> -->
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="Sendbutton" id="Sendbutton" class="btn btn-primary" >Send</button>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>


    </div>
  </div>
</div>
<!-- Basic Tables end -->

<link href="http://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">   
<script src="http://code.jquery.com/jquery-3.3.1.js"></script>

<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
$('#dataTableExample1').DataTable({order:[]});

</script>


@endsection

@section('page-script')
  <!-- Page js files -->
  <script src="jquery-3.6.4.min.js"></script>

  <script>

    $('#Sendbutton').click(function(){
      $('#number_span').html('');

      var number = $('#number').val();
      var type =  $('#type_ids').val();
      var amount = '0';

      if(number == ''){
        $('#number_span').html('Please enter number');
        return $('#number').focus();
      }

      var url   = $('#app_url').val();

      $.ajax({
        url: 'generate-coupon-code'+'/'+number+'/'+type+'/'+amount, // JSON file to add data,
        type: 'get',
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (data) {

          $('#close-btn').click();


          window.open("https://api.whatsapp.com/send?phone=91"+(data.phoneno)+"&text= Get your code using this link : "+(url)+"/public/link/"+(data.uuid), '_blank');

        },
        error: function (data) {
        }
      });






    });

  </script>
@endsection