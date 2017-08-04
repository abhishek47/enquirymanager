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
        margin: 5px;
        margin-top: 15px;
        border:1px solid #000;
        font-size:14px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#000;
        padding: 8px;
    }
    
    .invoice-box table{
        padding: 5px;
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:2px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:5px;
        border-bottom: 1px solid #000;
    }

    .invoice-box table tr.bottom table td{
        padding-top:15px;
        border-top: 1px solid #000;

    }

     .invoice-box table tr.bottom table td.title{
        font-size:45px;
        line-height:45px;
        color:#000;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#000;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:12px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #000;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:12px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #000;
        letter-spacing: 1px;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #000;
        font-weight:bold;
        font-size: 19px;
        padding-top: 10px;
        letter-spacing: 1px;
         padding-bottom: 10px;

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
        <h3 style="text-align: center;text-decoration:underline;padding:0px;margin:0px;">
        Customer Enquiry/Quotation 
      </h3>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="http://acem.edu.np/techbihani/img/hero.png" style="width:100%; max-width:100px;">
                            </td>
                            
                            <td>
                                <b style="font-size: 20px;">Shivang Automobiles</b><br>
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
                                <b>Name :</b> {{ $enquiry->name }}<br>
                                <b>Address :</b> {{ $enquiry->address }}<br>
                                <b>Phone :</b> {{ $enquiry->phone }}<br>
                               <!-- <b>Vehicle Model : </b> {{ $enquiry->vehicle_id }} | {{ $enquiry->vehicle_color }} -->
                                <b>Vehicle Model : </b> {{ $enquiry->vehicle->name }} | {{ $enquiry->vehicle_color }} Color
                            </td>

                            <td>
                                <b>Quotation #: </b>{{ $enquiry->id }}<br>
                                <b>Created:</b> {{ $enquiry->created_at->format('M d, Y') }}<br>
                                @if($enquiry->payment_type)
                                    <b>Financer : </b> {{ $enquiry->financer->name }}<br>
                                    <b>Finance Manager :</b> {{ $enquiry->financeManager->name }}
                                @endif
                          </td>
                            
                        </tr>

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
                    {{ $enquiry->payment_type ? 'Finance' : 'Cash' }}
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

            <tr class="item last">
                <td>
                    H.P.A.
                </td>
                
                <td>
                    Rs. {{ $enquiry->hpa_charges }}
                </td>
            </tr>

           
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: Rs. {{ $enquiry->total }}
                </td>
            </tr>


              <tr class="information" >
                <td colspan="2" style="border-top: 1px solid #000;">
                    <table style="margin-top:5px;">
                        <tr>
                            <td>
                                <b>Authorised Dealer : Hero Motocorp Ltd.</b><br>
                                <b>GSTIN # :</b> 27AEJPB0313A1ZH<br>
                                
                                <ul style="margin: 2px;padding-left:14px;font-size:12px;">
                                  <li>Price are subject to change without prior notice.</li>
                                  <li>Price Pravaling at the time of delivery shall be applicable.</li>
                                  <li>Payments/Refunds will be made by account payee checks only.</li>
                                  <li>
                                    Demand Draft/Check should be in the name of Shivang Automobiles.   
                                  </li>
                                  <li>डिमांड दराफ्ट अथवा चेक हा " शिवांग आटोमोबाइल्स " या नावाने द्यावा.</li>
                              </ul>
                            </td>

                            <td>
                              <div  style="border: 1px solid #000;font-size:12px;text-align:left;padding-left:0px;margin-top: 1px;">
                                
                              
                              <p style="border-bottom: 1px solid #000;padding-left:5px;font-weight: bold;">टीप : गाडी रेजिस्ट्रेशनसाठी खालील काकडपत्र आवश्यक आहे</p>
                              <ul style="margin: 0px;padding-left:24px;font-size:12px;">
                                <li style="float: left;
    margin-right: 120px;"> फोटो </li>
                                <li>मतदान कार्ड</li>
                                <li style="float: left; margin-right: 95px;" >लाईट बिल</li>
                                <li style="margin-bottom:5px;">पॅनकार्ड</li>
                                
                              </ul>
                                </div>  

                            <div>
                                <h4 style="text-align: center;">
                                  For, <b style="text-:uppercase;">Shivang Automobiles</b>
                                </h4>
                                
                                <p style="text-align:center;margin-top: 6px;">
                                  ( Authorised Signature )
                                </p>
                                
                              </div>
                                   
                          </td>
                        </tr>

                          
                        
                    </table>
                </td>
            </tr>


              <tr class="information" >
                <td colspan="2" style="border-top: 1px solid #000;padding:0px;border-bottom:1px solid #000;">
                    <table style="margin-top:5px;">
                       <div style="text-align:center;">
              
                      <p style="margin: 0 auto;margin-top:1px;margin-bottom:0px;width:80%;padding-bottom:0px;">
                        <b>Account Details for Bank Transfer -</b> Bank Name : HDFC Bank Ltd., Account No. : 00XX234890, IFSC CODE : HDFC0064
                      </p>
                     </div>
                  </table>
                </td>
            
          </tr>


        </table>
    </div>

    <script type="text/javascript">
      window.print();
    </script>
</body>
</html>