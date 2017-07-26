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

                          <canvas id="weekChart" width="400" height="300"></canvas>
                      </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="card" >
                       <div class="card-block">
                           <div class="card-title"><b>Monthly Stats</b></div>
                            <canvas id="monthChart" width="400" height="300"></canvas>
                       </div>
                  </div>
                </div>
                
              </div>

              <br>



<div class="row justify-content-center">
                <div class="col-md">
                  <div class="card">
                      <div class="card-block">
                          <div class="card-title"><b>Overall Stats</b></div>

                          <canvas id="overallChart" width="400" height="300"></canvas>
                      </div>
                  </div>
                </div>
                <div class="col-md">
                  <div class="card" >
                       <div class="card-block">
                           <div class="card-title"><b>Employee Wise Stats</b></div>
                            <canvas id="epwiseChart" width="400" height="300"></canvas>
                       </div>
                  </div>
                </div>
                
              </div>


              <br>

              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="card">
                      <div class="card-block">
                          <div class="card-title"><b>Vehicle Wise Stats</b></div>

                          <canvas id="vwiseChart" width="400" height="300"></canvas>
                      </div>
                  </div>
                </div>
               
              </div>


              <br><br><br>



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
            data: [20, 25, 8, 16, 12, 24, 28],
            backgroundColor:'rgba(255, 99, 132, 0.2)',
               
            borderColor: 'rgba(255,99,132,1)',
          
            borderWidth: 1
        },
        {
            label: 'Count of Sales',
            data: [12, 19, 3, 5, 2, 14, 18],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            
            borderColor: 'rgba(75, 192, 192, 1)',
            
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


<script>
var ctx = document.getElementById("overallChart");
var myChart = new Chart(ctx, {
   type: 'pie',
        data: {
            datasets: [{
                data: [
                    45,
                    55,
                    32,
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                ],
                label: 'Enquiries'
            }],
            labels: [
                "Sold",
                "Cancelled",
                "Void"            ]
        },
        options: {
            responsive: true
        }
});
</script>



<script>
var ctx = document.getElementById("epwiseChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Rahul Bhat", "Ajay Shetty", "Ravi Sonawane", "Sunny Pande"],
        datasets: [{
            label: 'Count of Sales',
            data: [12, 19, 3, 24],
            backgroundColor: [
                'rgba(64, 64, 255, 0.2)'
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

<script>
var ctx = document.getElementById("vwiseChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Maestro", "Splendor", "Achiever", "Passion Pro", "Ignitor", "Karizma"],
        datasets: [{
            label: 'Count of Enquiries',
            data: [20, 25, 8, 16, 12, 24, 28],
            backgroundColor: 'rgb(255, 99, 132)',
            
            borderColor: 'rgb(255, 99, 132)',
            
            borderWidth: 1
        },
        {
            label: 'Count of Sales',
            data: [12, 19, 3, 5, 2, 14, 18],
            backgroundColor: 'rgb(100, 99, 255)',
            
            borderColor: 'rgb(100, 99, 255)',
            
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