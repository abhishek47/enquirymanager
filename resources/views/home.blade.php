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

          <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                <div class="card-block">
                
                 <div class="row">
                  
                   <div class="col-md-9">
                    <h5> 
                    Company : <b> {{ auth()->user()->company->name }} </b> 
                    </h5>
                     
                   </div> 

                   <div class="col-md">
                        <h5>  Enquiries Made Today : <b>{{ $enquiriesToday }}</b> </h5>
                   </div>

                    


                   

                    </div>

                    
                    
                </div>
            </div>

            </div>

            </div>

            <br>
  
  <div class="row justify-content-center" id="stats">
    <div class="col-md">
      <a href="/enquiries" class="card bg-primary" style="color: #fff;">
          <div class="card-block">
              <div class="card-title"><b>Total Enquiries</b></div>

              <h4>{{ $enquiriesCount }}</h4>
          </div>
      </a>
    </div>
    @if(auth()->user()->isAdmin())
    <div class="col-md">
      <a href="/enquiries?cat=1" class="card bg-success" style="color: #fff;">
           <div class="card-block">
               <div class="card-title"><b>Enquiries Converted</b></div>
                <h4>{{ $enquiriesSold }}</h4>
           </div>
      </a>
    </div>
    <div class="col-md">
      <a href="/enquiries?cat=2" class="card bg-danger" style="color: #fff;">
           <div class="card-block">
               <div class="card-title"><b>Enquiries Cancelled</b></div>
                <h4>{{ $enquiriesCancelled }}</h4>
           </div>
      </a>
    </div>
    @endif
    <div class="col-md">
      <a href="/followups" class="card bg-info" style="color: #fff;">
           <div class="card-block" >
               <div class="card-title"><b>Today's Follow Ups</b></div>
                <h4>{{ $followups }}</h4>
           </div>
      </a>
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
                          <th>Enquiry To</th>
                          <th>Model</th>
                          @if(auth()->user()->role < 2)
                          <th>Actions</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>

                       @foreach($enquiries as $enquiry)
                       
                            <tr id="enquiry-{{$enquiry->id}}">
                              <th scope="row">{{ $enquiry->id }}</th>
                              <td>{{ $enquiry->name }}</td>
                              <td>{{ $enquiry->phone }}</td>
                              <td>{{ $enquiry->creator->name }}</td>
                              <td>{{ $enquiry->vehicle->name }}</td>
                                @if(auth()->user()->isAdmin())
                              <td><a target="_blank" href="{{ route('enquiries.show', ['enquiry' => $enquiry->id ])}}" class="btn btn-primary btn-sm">View</a> 
                                  <a href="{{ route('enquiries.edit', ['enquiry' => $enquiry->id ])}}" class="btn btn-success btn-sm">Edit</a> 
                                  <a href="#" @click="deleteEnquiry({{ $enquiry->id  }})" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                              @elseif(auth()->user()->role == 1)
                                 <td><a target="_blank" href="{{ route('enquiries.show', ['enquiry' => $enquiry->id ])}}" class="btn btn-primary btn-sm">Print Quote</a> </td>
                              @endif
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>

        <br><br><br>
       
      
    </div>
@endsection


@section('js')

<script>
var ctx = document.getElementById("monthChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: 'Count of Enquiries',
            data: [12, 19, 3, 5, 2, 14, 18],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
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

<script>
var ctx = document.getElementById("weekChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["16 Jul", "17 Jul", "18 Jul", "19 Jul", "20 Jul", "21 Jul", "22 July"],
        datasets: [{
            label: 'Count of Enquiries',
            data: [12, 19, 3, 5, 2, 14, 18],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)'
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