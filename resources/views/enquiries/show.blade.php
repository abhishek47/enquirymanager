<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enquiry #{{$enquiry->id}}</title>

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
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
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
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="http://acem.edu.np/techbihani/img/hero.png" style="width:100%; max-width:100px;">
                            </td>
                            
                            <td>
                                <b>Shivang Automobiles</b><br>
                                {{ auth()->user()->company->address }} <br>
                                <b>Phone : </b> {{ str_replace(',', '/', auth()->user()->company->phones) }} | <b>Fax : </b> {{ auth()->user()->company->fax }}<br>
                                <b>Website : </b> {{ auth()->user()->company->website }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information" >
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <p><b>Name :</b> {{ $enquiry->name }}<br></p>
                                <p><b>Address :</b> {{ $enquiry->address }}<br></p>
                                <p><b>Phone :</b> {{ $enquiry->phone }}<br></p>
                               <!-- <b>Vehicle Model : </b> {{ $enquiry->vehicle_id }} | {{ $enquiry->vehicle_color }} -->
                                <b>Vehicle Model : </b> Maestro | White Color
                            </td>

                            <td>
                                <p><b>Quotation #: </b>{{ $enquiry->id }}<br></p>
                                <b>Created:</b> {{ $enquiry->created_at->format('M d, Y') }}<br>
                          </td>
                            
                        </tr>
                       
                          
                        
                    </table>
                </td>
            </tr>

            <tr class="information">
              <td colspan="2">
                      <table>
                          <tr>
                              <td>
                                  <b>Expected Date :</b> {{ $enquiry->buy_date }}
                              </td>

                              <td><b>Contact Date :</b> {{ $enquiry->contact_date }}</td>
                              
                          </tr>
                      </table>
                  </td>
            </tr>    

          
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    {{ $enquiry->payment_type ? 'Cash' : 'Finance' }}
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Occupation
                </td>
                
                <td>
                    {{ $enquiry->payment_type ? 'Business' : 'Job' }}
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Vehicle Cost
                </td>
                
                <td>
                    Rs. {{ $enquiry->vehicle_cost }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    R.T.O Incendital &amp; Depo Charges
                </td>
                
                <td>
                    Rs. {{ $enquiry->rto_charges }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Insuarance
                </td>
                
                <td>
                    Rs. {{ $enquiry->insuarance_charges }}
                </td>
            </tr>

            <tr class="item">
                <td>
                    H.P.A.
                </td>
                
                <td>
                    Rs. {{ $enquiry->hpa_charges }}
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Accessories
                </td>
                
                <td>
                    Rs. {{ $enquiry->accessories }}
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: Rs. {{ $enquiry->total }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>