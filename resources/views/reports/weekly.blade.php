<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Weekly Report</title>

    <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        border:1px solid #000;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
        border-bottom: 1px solid #000;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border:1px solid #000;
        font-weight:bold;
        text-align: center;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;

    }
    
    .invoice-box table tr.item td{
        border:1px solid #000;
        text-align: center;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #000;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">

    <h2>Employee Wise Data</h2>
        <table cellpadding="0" cellspacing="0">
              

                                <tr class="heading">
                                  <th>#</th>
                                  <th>Employee </th>
                                  <th>Enquiries</th>
                                  <th>Sales</th>
                                </tr>
                            
                                 
                            
                            @foreach($employees as $index => $employee)
                            <tr class="item">
                              <td> {{ $index+1 }} </td>

                              <td>{{ $employee->name }}</td>

                              <td>{{ $employee->enquiries()->count() }} </td>
                               <td>{{ $employee->enquiries()->where('status', 1)->count() }}</td> 


                             </tr> 

                            @endforeach

                           
                            </table>

                            <hr>

        <h2>Vehicle Wise Data</h2>
        <table cellpadding="0" cellspacing="0">
              

                                <tr class="heading">
                                  <th>#</th>
                                  <th>Vehicle </th>
                                  <th>Enquiries</th>
                                  <th>Sales</th>
                                </tr>
                            
                                 
                            
                            @foreach($vehicles as $index => $vehicle)
                            <tr class="item">
                              <td> {{ $index+1 }} </td>

                              <td>{{ $vehicle->name }}</td>

                              <td>{{ $vehicle->enquiries()->count() }} </td>
                               <td>{{ $vehicle->enquiries()->where('status', 1)->count() }}</td> 


                             </tr> 

                            @endforeach

                           
                            </table>


                            <hr>
        <h2>Financer Wise Data</h2>
        <table cellpadding="0" cellspacing="0">
              

                                <tr class="heading">
                                  <th>#</th>
                                  <th>Financer </th>
                                  <th>Enquiries</th>
                                  <th>Sales</th>
                                </tr>
                            
                                 
                            
                            @foreach($financers as $index => $financer)
                            <tr class="item">
                              <td> {{ $index+1 }} </td>

                              <td>{{ $financer->name }}</td>

                              <td>{{ $financer->enquiries()->count() }} </td>
                               <td>{{ $financer->enquiries()->where('status', 1)->count() }}</td> 


                             </tr> 

                            @endforeach

                           
                            </table>

          
            
            
            
            
            
       
    </div>

  
</body>
</html>