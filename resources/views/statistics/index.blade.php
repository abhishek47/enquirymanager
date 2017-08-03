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
                           <div class="card-title"><b>Employee Wise Stats</b></div>
                            
                            @foreach($employees as $employee)

                              <h4>{{ $employee->name }}</h4>

                              <p><b>Enquiries : </b> {{ $employee->enquiries()->count() }}</p>

                              <p><b>Sales : </b> {{ $employee->enquiries()->where('status', 1)->count() }}</p>

                              <hr>

                            @endforeach
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

                          @foreach($vehicles as $vehicle)

                              <h4>{{ $vehicle->name }}</h4>

                              <p><b>Enquiries : </b> {{ $vehicle->enquiries()->count() }}</p>

                              <p><b>Sales : </b> {{ $vehicle->enquiries()->where('status', 1)->count() }}</p>

                              <hr>

                          @endforeach
                         
                      </div>
                  </div>
                </div>
               
              </div>


              <br><br><br>



@endsection


