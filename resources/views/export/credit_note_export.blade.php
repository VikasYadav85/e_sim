 <br>
<table>
    <thead>
     <tr>
           Credit Note
        </tr>
        <tr style="background:#25258e; color:white;">
            <th>Document Number</th>
            <th>Item Code</th>    
            <th>Quantity</th> 
        </tr>
    </thead>
    <tbody>   
        @foreach($get_data as $get_datasa)
            <tr>
        
                <td>{{$get_datasa->DocumentNumber}}</td>
                <td></td> <!-- Initialize an empty cell for Item Code -->
                <td></td> <!-- Initialize an empty cell for Quantity -->
            </tr>

            @php
                $get_details = DB::table('tbl_sales_return_details')
                    ->select('tbl_sales_return_details.ItemCode', 'tbl_sales_return_details.ItemQuantity')
                    ->where('tbl_sales_return_details.header_id', '=', $get_datasa->inv_id)
                    ->get();
                  
            @endphp

            @foreach($get_details as $get_detailss)
                <tr>
                    <td></td> <!-- Empty cell for Document Number -->
                    <td>{{$get_detailss->ItemCode}}</td>
                    <td>{{$get_detailss->ItemQuantity}}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
 
