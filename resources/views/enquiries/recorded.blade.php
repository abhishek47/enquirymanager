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
                     <div class="card-title"><h2>Enquiry Recorded</h2></div>
                     <hr>

                     <h3><b># ID : </b> {{ $enq->id }}</h3>

                     <h3><b>Name : </b> {{ $enq->name }}</h3>

                     <h3><b>Phone : </b> {{ $enq->phone }}</h3>

                     <p><a href="/enquiries/new" class="btn btn-success">Create New Enquiry</a></p>


                      
                </div>
            </div>
        </div>
    </div>


<br><br><br>
@endsection
