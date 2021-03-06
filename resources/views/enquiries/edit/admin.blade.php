<div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
               <a class="breadcrumb-item" href="/enquiries">Enquiries</a>
              <span class="breadcrumb-item active">Edit - {{ $enquiry->id }}</span>
            </nav>
          
         </div>
        </div>

    <div class="row justify-content-center">
        <div class="col col-sm-12">
            <div class="card">
               
                 <div class="card-block">
                     <div class="card-title">
                       <div class="row">
                        <div class="col col-sm-9">
                          <h2>Editing Enquiry - #{{ $enquiry->id }} <span id="status" style="font-size: 16px;" class="badge badge-primary">
                          {{ $enquiry->status == -1 ? '' : ($enquiry->status == 0 ? 'void-' . $enquiry->void_reason : ($enquiry->status == 1 ? 'sold' : 'cancelled')) }}
                          </span></h2>
                        </div>
                        <div class="col col-sm-3" style="padding-top: 10px;">
                          <a href="#" @click="updateEnquiryStatus({{ $enquiry->id }}, 1)" class="btn btn-success btn-sm">Sold</a> 
                                  <a href="#" @click="updateEnquiryStatus({{ $enquiry->id }}, 2)" class="btn btn-danger btn-sm">Cancelled</a> 
                                  <a href="#" data-toggle="modal" data-target="#voidModal" class="btn btn-primary btn-sm">Void</a>
                        </div>
                       </div>
                     </div>
                     <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('enquiries.update', ['enquiry' => $enquiry->id]) }}">
                        {{ csrf_field() }}

                        <div class="row justify-content-center"> 
                          <div class="col col-md-6" >
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                               
                                    <label for="name" class="control-label">Name</label>
                                    <input id="name" placeholder="Enquirer Name" type="text" class="form-control" name="name" 
                                       value="{{ old('name') ? old('name') : $enquiry->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                         <div class="col col-md-6">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                               
                                    <label for="phone" class="control-label">Contact Number</label>
                                    <input id="phone" placeholder="Ex.: 9922367414" type="text" class="form-control" name="phone" 
                                     value="{{ old('phone') ? old('phone') : $enquiry->phone }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>
                         
                         <div class="row justify-content-center"> 
                         <div class="col col-md-6">
                            <div class="form-group{{ $errors->has('buy_date') ? ' has-error' : '' }}">
                               
                                    <label for="buy_date" class="control-label">Date to Buy</label>
                                    <input id="buy_date" type="date" class="form-control" name="buy_date" value="{{ old('buy_date') ? old('buy_date') : $enquiry->buy_date }}" required autofocus>

                                    @if ($errors->has('buy_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('buy_date') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                         <div class="col col-md-6">
                            <div class="form-group{{ $errors->has('contact_date') ? ' has-error' : '' }}">
                               
                                    <label for="contact_date" class="control-label">Best time to contact</label>
                                    <input id="contact_date" type="date" class="form-control" name="contact_date" 
                                     value="{{ old('contact_date') ? old('contact_date') : $enquiry->contact_date }}" required>

                                    @if ($errors->has('contact_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_date') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>

                         <div class="row justify-content-center"> 
                         <div class="col col-md-12">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                               
                                    <label for="address" class="control-label">Address</label>
                                    <textarea id="address" rows="3" placeholder="Enquires's Permanent Address"  class="form-control" name="address">{{ old('address')  ? old('address') : $enquiry->address }}</textarea>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>
                         
                         <div class="row justify-content-center"> 

                         <div class="col col-md-6">
                            <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                               
                                    <label for="occupation" class="control-label">Occupation</label>
                                    <select id="occupation" name="occupation" class="form-control">
                                        <option value="job">Job</option>
                                        <option value="business">Business</option>
                                    </select>

                                    @if ($errors->has('occupation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('occupation') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>




                         
                         <div class="col col-md-6" >
                            <div class="form-group{{ $errors->has('payment_type') ? ' has-error' : '' }}">
                               
                                    <label for="payment_type" class="control-label">Payment Type</label>
                                    <select id="payment_type" name="payment_type" class="form-control">
                                        <option value="0" {{ $enquiry->payment_type == 1 ? 'selected' : '' }}>Finance</option>
                                        <option value="1" {{ $enquiry->payment_type == 0 ? 'selected' : '' }}>Cash</option>
                                    </select>

                                    @if ($errors->has('payment_type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('payment_type') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                          </div>

                          @if($enquiry->payment_type)


                           <div class="row justify-content-center" id="financer"> 

                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('financer_id') ? ' has-danger' : '' }}">
                               
                                    <label for="financer_id" class="control-label">Financer Company</label>
                                    <select id="financer_id" name="financer_id" @change="loadFinanceManagers(this)" class="form-control {{ $errors->has('financer_id') ? ' form-control-danger' : '' }}">
                                     <option disabled selected value>--Select Financer--</option> 
                                      @foreach($financers as $financer)
                                        <option value="{{ $financer->id }}" {{ $enquiry->financer_id == $financer->id ? 'selected' : '' }}>{{ $financer->name }}</option>
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
                                      @foreach($enquiry->financer->managers as $manager) 
                                          <option value="{{ $manager->id }}" {{ $enquiry->finance_manager_id == $manager->id ? 'selected' : '' }}>{{ $manager->name }}</option>
                                      @endforeach
                                      
                                    </select>

                                    @if ($errors->has('finance_manager_id'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('finance_manager_id') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                          </div>

                          @endif
                       

                       <div class="row justify-content-center"> 


                         <div class="col col-md-6">
                            <div class="form-group{{ $errors->has('vehicle_id') ? ' has-error' : '' }}">
                               
                                    <label for="vehicle_id" class="control-label">Vehicle Model</label>
                                    <select id="vehicle_id" name="vehicle_id" class="form-control">
                                      @foreach($vehicles as $vehicle)
                                         @if(!old('vehicle_id'))
                                          <option value="{{ $vehicle->id }}" {{ $enquiry->vehicle_id == $vehicle->id ? 'selected' : '' }} >{{ $vehicle->name }}</option>
                                         @else
                                           <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }} >{{ $vehicle->name }}</option>
                                         @endif   
                                      @endforeach 
                                    </select>

                                    @if ($errors->has('vehicle_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_id') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         <div class="col col-md-6">
                            <div class="form-group{{ $errors->has('vehicle_color') ? ' has-error' : '' }}">
                               
                                    <label for="vehicle_color" class="control-label">Vehicle Color (Preference)</label>
                                    <input id="vehicle_color" placeholder="Ex.: White" type="text" class="form-control" name="vehicle_color" 
                                     value="{{ old('vehicle_color') ? old('vehicle_color') : $enquiry->vehicle_color }}" required>

                                    @if ($errors->has('vehicle_color'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('vehicle_color') }}</strong>
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>

                         <div class="row justify-content-center"> 

                         <div class="col col-md-12">
                            <table class="table">
                              <thead class="thead-inverse">
                                <tr>
                                  <th>#</th>
                                  <th>Particulars</th>
                                  <th>Amount ( &#8377 )</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Vehicle Cost</td>
                                  <td><input id="vehicle_cost" placeholder="Amount in Rs." type="text" class="form-control" name="vehicle_cost" value="{{ old('vehicle_cost') ? old('vehicle_cost') : $enquiry->vehicle_cost   }}" required></td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>R.T.O. Icendital &amp; Depo Charges</td>
                                  <td><input id="rto_charges" placeholder="Amount in Rs." type="text" class="form-control" name="rto_charges" value="{{ old('rto_charges')  ? old('rto_charges') : $enquiry->rto_charges  }}" required></td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Insuarance</td>
                                  <td><input id="insuarance_charges" placeholder="Amount in Rs." type="text" class="form-control" name="insuarance_charges" value="{{ old('insuarance_charges') ? old('insuarance_charges') : $enquiry->insuarance_charges }}" required></td>
                                </tr>
                                <tr>
                                  <th scope="row">4</th>
                                  <td>H.P.A.</td>
                                  <td><input id="hpa_charges" placeholder="Amount in Rs." type="text" class="form-control" name="hpa_charges" value="{{ old('hpa_charges') ? old('hpa_charges') : $enquiry->hpa_charges  }}" required></td>
                                </tr>
                                <tr>
                                  <th scope="row">5</th>
                                  <td>Accessories</td>
                                  <td><input id="accessories" placeholder="Amount in Rs." type="text" class="form-control" name="accessories" value="{{ old('accessories') ? old('accessories') : $enquiry->accessories  }}" required></td>
                                </tr>
                              </tbody>
                            </table> 
                         </div>

                         </div>


                       

                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary">
                                    Update Enquiry
                                </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<br><br><br>