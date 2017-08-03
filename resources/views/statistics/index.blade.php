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

                           <form action="/statistics" method="GET">

                            <div class="row justify-content-center"> 
                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                               
                                    <label for="start_date" class="control-label">Start Date</label>
                                    <input id="start_date" type="date" class="form-control{{ $errors->has('start_date') ? ' form-control-danger' : '' }}" name="start_date" value="{{ old('start_date') ? old('start_date') : request('start_date') }}"  autofocus>

                                    @if ($errors->has('start_date'))
                                        <span class="form-control-feedback">
                                           {{ $errors->first('start_date') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>


                         <div class="col-md-6">
                            <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                               
                                    <label for="end_date" class="control-label">End Date</label>
                                    <input id="end_date" type="date" class="form-control {{ $errors->has('end_date') ? ' form-control-danger' : '' }}" name="end_date" value="{{ old('end_date') ? old('end_date') : request('end_date') }}" >

                                    @if ($errors->has('end_date'))
                                        <span class="form-control-feedback">
                                            {{ $errors->first('end_date') }}
                                        </span>
                                    @endif
                               
                            </div>
                         </div>

                         </div>

                         <button type="submit" class="btn btn-success">Filter Stats</button>
                           </form>
                       </div>
                  </div>
                </div>
                
              </div>

              <br>



<div class="row justify-content-center">
                
                <div class="col-md-12">
                  <div class="card" >
                       <div class="card-block">
                           <div class="card-title"><b>Employee Wise Stats {{ request('start_date') - request('end_date') }}</b></div>

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

                              @if(Request::has('start_date') && Request::has('end_date'))
                                 <td>{{ $employee->enquiries()->whereBetween('created_at', [request('start_date'), request('end_date')])->count() }} </td> 
                                 <td>{{ $employee->enquiries()->whereBetween('created_at', [request('start_date'), request('end_date')])->where('status', 1)->count() }}</td> 
                              @else 
                               <td>{{ $employee->enquiries()->count() }} </td>
                                <td>{{ $employee->enquiries()->where('status', 1)->count() }}</td> 
                              @endif 


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
                          <div class="card-title"><b>Vehicle Wise Stats {{ request('start_date') - request('end_date') }}</b></div>

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
                                
                            
                            @foreach($vehicles as $index => $vehicle)
                            <tr>
                              <td> {{ $index+1 }} </td>

                              <td>{{ $vehicle->name }}</td>

                              @if(Request::has('start_date') && Request::has('end_date'))
                                 <td>{{ $vehicle->enquiries()->whereBetween('created_at', [request('start_date'), request('end_date')])->count() }} </td> 
                                 <td>{{ $vehicle->enquiries()->whereBetween('created_at', [request('start_date'), request('end_date')])->where('status', 1)->count() }}</td> 
                              @else 
                               <td>{{ $vehicle->enquiries()->count() }} </td>
                                <td>{{ $vehicle->enquiries()->where('status', 1)->count() }}</td> 
                              @endif 

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


