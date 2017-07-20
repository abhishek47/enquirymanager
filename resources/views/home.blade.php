@extends('layouts.app')

@section('content')

   <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="#">EM</a>
              <span class="breadcrumb-item active">Home</span>
            </nav>
          
         </div>
        </div>
  
  <div class="row justify-content-center" id="stats">
    <div class="col-md">
      <div class="card bg-primary" style="color: #fff;">
          <div class="card-block">
              <div class="card-title"><b>Enquiries Made</b></div>

              <h4>{{ $enquiriesCount }}</h4>
          </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card bg-success" style="color: #fff;">
           <div class="card-block">
               <div class="card-title"><b>Enquiries Converted</b></div>
                <h4>{{ $enquiriesSold }}</h4>
           </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card bg-danger" style="color: #fff;">
           <div class="card-block">
               <div class="card-title"><b>Enquiries Cancelled</b></div>
                <h4>{{ $enquiriesCancelled }}</h4>
           </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
           <div class="card-block bg-info" style="color: #fff;">
               <div class="card-title"><b>Today's Follow Ups</b></div>
                <h4>{{ $followups }}</h4>
           </div>
      </div>
    </div>
  </div>
  <br>

    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                <div class="card-block">
                
                 <div class="row">
                  
                   <div class="col-md-6">
                    <h5> 
                    Company : <b> {{ auth()->user()->company->name }} </b> 
                    </h5>
                     
                   </div> 

                   <div class="col-md">
                        <h5>  Enquiries Made Today : <b>{{ $enquiriesToday }}</b> </h5>
                   </div>

                    <div class="col-md">
                     <h5> 
                        Follow Up's For Today : <b>{{ $followups }}</b>
                     </h5> 

                    </div>


                   

                    </div>

                    <hr>

                    <p> 
                      <a href="{{ route('enquiries.create') }}"  class="btn btn-success">Add New Enquiry</a>
                      <a href="{{ route('enquiries.followups') }}"  class="btn btn-warning">Manage Follow Up's</a>
                    </p>
                    
                </div>
            </div>

            <br>

            <div class="row justify-content-center">
                <div class="col-md">
                  <div class="card">
                      <div class="card-block">
                          <div class="card-title"><b>Daily Chart</b></div>

                          <canvas id="myChart" width="400" height="400"></canvas>
                      </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="card" >
                       <div class="card-block">
                           <div class="card-title"><b>Monthly Chart</b></div>
                            <h4>{{ count($enquiries) }}</h4>
                       </div>
                  </div>
                </div>
                
              </div>
              
              <br>
             <div class="card">
                <div class="card-block">
                <div class="card-title"><h4>Enquiries <small style="font-size: 15px;"><a href="/enquiries">View All Enquiries</a></small></h4></div>

                <hr>
                    <table class="table">
                      <thead class="thead-inverse">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Contact Date</th>
                          <th>Model</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                       @foreach($enquiries as $enquiry)
                       
                            <tr id="enquiry-{{$enquiry->id}}">
                              <th scope="row">{{ $enquiry->id }}</th>
                              <td>{{ $enquiry->name }}</td>
                              <td>{{ $enquiry->phone }}</td>
                              <td>{{ $enquiry->contact_date }}</td>
                              <td>{{ $enquiry->vehicle_id }}</td>
                              <td><a href="{{ route('enquiries.show', ['enquiry' => $enquiry->id ])}}" class="btn btn-primary btn-sm">View</a> 
                                  <a href="{{ route('enquiries.edit', ['enquiry' => $enquiry->id ])}}" class="btn btn-success btn-sm">Edit</a> 
                                  <a href="#" @click="deleteEnquiry({{ $enquiry->id  }})" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>

            
        </div>
       
      
    </div>
@endsection


@section('js')

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

@endsection