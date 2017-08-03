@extends('layouts.app')

@section('content')
   <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">EM</a>
              <span class="breadcrumb-item active">Statistics</span>
            </nav>
          
         </div>
        </div>



<div class="row justify-content-center">
                <div class="col-md">
                  <div class="card">
                      <div class="card-block">
                          <div class="card-title"><b>Last 7 Days</b></div>

                          <h4>Enquiries : {{ $e7days }}</h4>

                          <h4>Sales : {{ $e7daysSales }} </h4>


                         
                      </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="card">
                      <div class="card-block">
                          <div class="card-title"><b>Last 30 Days</b></div>

                          <h4>Enquiries : {{ $e30days }}</h4>

                          <h4>Sales : {{ $e30daysSales }} </h4>

                         
                      </div>
                  </div>
                </div>
                
              </div>

              <br>

              <div class="row justify-content-center">
                
                <div class="col-md-12">
                  <div class="card" >
                       <div class="card-block">
                           <div class="card-title"><b>Filter Statistics</b></div>

                            <div class="row justify-content-center"> 
                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('buy_date') ? ' has-danger' : '' }}">
                               
                                    <label for="buy_date" class="control-label">Start Date</label>
                                    <input id="buy_date" type="date" class="form-control{{ $errors->has('buy_date') ? ' form-control-danger' : '' }}" name="buy_date" value="{{ old('buy_date') }}" required autofocus>

                                    @if ($errors->has('buy_date'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('buy_date') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('contact_date') ? ' has-danger' : '' }}">
                               
                                    <label for="contact_date" class="control-label">End Date</label>
                                    <input id="contact_date" type="date" class="form-control {{ $errors->has('contact_date') ? ' form-control-danger' : '' }}" name="contact_date" value="{{ old('contact_date') }}" required>

                                    @if ($errors->has('contact_date'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('contact_date') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>
                           
                       </div>
                  </div>
                </div>
                
              </div>

              <br>



<div class="row justify-content-center">
                
                <div class="col-md-12">
                  <div class="card" >
                       <div class="card-block">
                           <div class="card-title"><b>Employee Wise Stats</b></div>

                           <table class="table">
                              <thead class="thead-inverse">
                                <tr>
                                  <th>#</th>
                                  <th>Employee </th>
                                  <th>Enquiries</th>
                                  <th>Sales</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                            
                            @foreach($employees as $index => $employee)
                            <tr>
                              <td> {{ $index+1 }} </td>

                              <td>{{ $employee->name }}</td>

                              <td>{{ $employee->enquiries()->count() }} </td> 

                              <td>{{ $employee->enquiries()->where('status', 1)->count() }}</td>

                             </tr> 

                            @endforeach

                            </tbody>

                            </table>
                       </div>
                  </div>
                </div>
                
              </div>


              <br>

              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card">
                      <div class="card-block">
                          <div class="card-title"><b>Vehicle Wise Stats</b></div>

                           <table class="table">
                              <thead class="thead-inverse">
                                <tr>
                                  <th>#</th>
                                  <th>Vehicle </th>
                                  <th>Enquiries</th>
                                  <th>Sales</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                            
                            @foreach($vehicles as $index => $vehicles)
                            <tr>
                              <td> {{ $index+1 }} </td>

                              <td>{{ $vehicles->name }}</td>

                              <td>{{ $vehicles->enquiries()->count() }} </td> 

                              <td>{{ $vehicles->enquiries()->where('status', 1)->count() }}</td>

                             </tr> 

                            @endforeach

                            </tbody>

                            </table>
                         
                      </div>
                  </div>
                </div>
               
              </div>


              <br><br><br>



@endsection


