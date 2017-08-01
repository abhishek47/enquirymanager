@extends('layouts.app')

@section('content')
 @if(auth()->user()->role < 2)
   <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <a class="breadcrumb-item" href="/enquiries">Enquiries</a>
              <span class="breadcrumb-item active">New</span>
            </nav>
          
         </div>
        </div>
    @endif    

    <div class="row justify-content-center">
        <div class="col col-sm-12">
            <div class="card" >
               
                 <div class="card-block">
                     <div class="card-title"><h2>Create New Enquiry</h2></div>
                     <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('enquiries.store') }}">
                        {{ csrf_field() }}

                        <div class="row"> 
                          <div class="col-md-6" >
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                               
                                    <label for="name" class="control-label">Name</label>
                                    <input id="name" placeholder="Enquirer Name" type="text" class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}" name="name" value="{{ old('name') }}" autocomplete="off" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                               
                                    <label for="phone" class="control-label">Contact Number</label>
                                    <input id="phone" placeholder="Ex.: 9922367414" type="number" class="form-control{{ $errors->has('phone') ? ' form-control-danger' : '' }}" name="phone" value="{{ old('phone') }}" autocomplete="off" required>

                                    @if ($errors->has('phone'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>
                         
                         <div class="row justify-content-center"> 
                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('buy_date') ? ' has-danger' : '' }}">
                               
                                    <label for="buy_date" class="control-label">Date to Buy</label>
                                    <input id="buy_date" type="date" class="form-control{{ $errors->has('buy_date') ? ' form-control-danger' : '' }}" name="buy_date" value="{{ old('buy_date') ? old('buy_date') : date('Y-m-d') }}" required autofocus>

                                    @if ($errors->has('buy_date'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('buy_date') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('contact_date') ? ' has-danger' : '' }}">
                               
                                    <label for="contact_date" class="control-label">Best time to contact</label>
                                    <input id="contact_date" type="date" class="form-control {{ $errors->has('contact_date') ? ' form-control-danger' : '' }}" name="contact_date" value="{{ old('contact_date') ? old('contact_date') : date('Y-m-d') }}" required>

                                    @if ($errors->has('contact_date'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('contact_date') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>

                         <div class="row justify-content-center"> 
                         <div class="col-md-12">
                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                               
                                    <label for="address" class="control-label">Address</label>
                                    <textarea id="address" rows="3" placeholder="Enquires's Permanent Address"  class="form-control {{ $errors->has('address') ? ' form-control-danger' : '' }}" autocomplete="off" name="address">{{ old('address') }}</textarea>

                                    @if ($errors->has('address'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>
                         
                        
                          
                          <div class="row justify-content-center"> 

                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('occupation') ? ' has-danger' : '' }}">
                               
                                    <label for="occupation" class="control-label">Occupation</label>
                                    <select id="occupation" name="occupation" class="form-control {{ $errors->has('occupation') ? ' form-control-danger' : '' }}">
                                       <option disabled selected value>--Select Occupation--</option> 
                                        <option value="job">Job</option>
                                        <option value="business">Business</option>
                                    </select>

                                    @if ($errors->has('occupation'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('occupation') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>




                         
                         <div class="col-md-6" >
                            <div class="form-group{{ $errors->has('payment_type') ? ' has-danger' : '' }}">
                               
                                    <label for="payment_type" class="control-label">Payment Type</label>
                                    <select id="payment_type" @change="loadHpa()" name="payment_type" class="form-control {{ $errors->has('payment_type') ? ' form-control-danger' : '' }}">
                                        <option disabled selected value>--Select Payment Type--</option> 
                                        <option value="1">Finance</option>
                                        <option value="0">Cash</option>
                                    </select>

                                    @if ($errors->has('payment_type'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('payment_type') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                          </div>

                           <div class="row justify-content-center" id="financer" style="visibility: hidden;"> 

                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('financer_id') ? ' has-danger' : '' }}">
                               
                                    <label for="financer_id" class="control-label">Financer Company</label>
                                    <select id="financer_id" name="financer_id" @change="loadFinanceManagers(this)" class="form-control {{ $errors->has('financer_id') ? ' form-control-danger' : '' }}">
                                     <option disabled selected value>--Select Financer--</option> 
                                      @foreach($financers as $financer)
                                        <option value="{{ $financer->id }}">{{ $financer->name }}</option>
                                      @endforeach  
                                    </select>

                                    @if ($errors->has('financer_id'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('financer_id') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>





                         
                         
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('finance_manager_id') ? ' has-danger' : '' }}">
                               
                                    <label for="finance_manager_id" class="control-label">Finance Manager</label>
                                <select id="finance_manager_id" name="finance_manager_id" class="form-control {{ $errors->has('finance_manager_id') ? ' form-control-danger' : '' }}">
                                     <option disabled selected value>--Select Finance Manager--</option> 
                                      
                                    </select>

                                    @if ($errors->has('finance_manager_id'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('finance_manager_id') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                          </div>

                       <div class="row justify-content-center"> 


                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('vehicle_id') ? ' has-danger' : '' }}">
                               
                                    <label for="vehicle_id" class="control-label">Vehicle Model</label>
                                    <select id="vehicle_id" name="vehicle_id" @change="loadCost(this)" class="form-control {{ $errors->has('vehicle_id') ? ' form-control-danger' : '' }}">
                                     <option disabled selected value>--Select Vehicle--</option> 
                                      @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                      @endforeach  
                                    </select>

                                    @if ($errors->has('vehicle_id'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('vehicle_id') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('vehicle_color') ? ' has-danger' : '' }}">
                               
                                    <label for="vehicle_color" class="control-label">Vehicle Color (Preference)</label>
                                     <input id="vehicle_color" autocomplete="off" placeholder="Ex.: White" type="text" class="form-control {{ $errors->has('vehicle_color') ? ' form-control-danger' : '' }}" name="vehicle_color" 
                                     value="{{ old('vehicle_color') }}">

                                    @if ($errors->has('vehicle_color'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('vehicle_color') }}
                                        </div>
                                    @endif
                               
                            </div>
                         </div>

                         </div>

                         <div class="row justify-content-center"> 

                         <div class="col-md-12">
                            <table class="table">
                              <thead class="thead-inverse">
                                <tr>
                                  <th>Item</th>
                                  <th>Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Vehicle Cost</td>
                                  <td><input id="vehicle_cost" placeholder="" type="text" class="form-control" name="vehicle_cost" value="0" required readonly></td>
                                </tr>
                                <tr>
                                  <td>R.T.O. Icendital &amp; Depo Charges</td>
                                  <td><input id="rto_charges" placeholder="" type="text" class="form-control" name="rto_charges" value="0" required readonly></td>
                                </tr>
                                <tr>
                                  <td>Insuarance</td>
                                  <td><input id="insuarance_charges" placeholder="" type="text" class="form-control" name="insuarance_charges" value="0" required readonly></td>
                                </tr>
                                <tr>
                                  <td>H.P.A.</td>
                                  <td><input id="hpa_charges" placeholder="" type="text" class="form-control" name="hpa_charges" value="0" required readonly></td>
                                </tr>

                                <tr>
                                  <td>Total</td>
                                  <td><input id="total" placeholder="" type="text" class="form-control"  readonly></td>
                                </tr>
                                
                              </tbody>
                            </table> 
                         </div>

                         </div>


                       

                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary">
                                    Record Enquiry
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<br><br><br>
@endsection
