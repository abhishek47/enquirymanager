<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Follow Ups - {{ $date }}</title>

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
        padding:30px;
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
        border-bottom:1px solid #000;
        font-weight:bold;
        text-align: center;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
        text-align: left;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #000;
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
        <table cellpadding="0" cellspacing="0">
              

          
            
            
            <tr class="heading">
                <td>
                    #
                </td>
                
                <td>
                    Name
                </td>

                <td>
                    Enquiry Date
                </td>

                <td>
                    Model
                </td>

                <td>
                    Date to Buy
                </td>

                <td>
                    Comments
                </td>
            </tr>


            @foreach($followups as $index => $followup) 
            
            <tr class="item">
                <td>
                    {{ $index+1 }}
                </td>

                <td>
                    {{ $followup->name }}
                </td>

                <td>
                    {{ $followup->created_at->format('d-m-Y') }}
                </td>

                <td>
                    {{ $followup->vehicle->name }}
                </td>
                
                <td>
                    {{ $followup->buy_date }}
                </td>

                <td>
                   
                </td>
            </tr>

           @endforeach 
            
            
        </table>
    </div>

    <script type="text/javascript">
      window.print();
    </script>
</body>
</html>