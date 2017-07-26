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

                     <p style="margin-bottom: 3px;"><b># ID : </b> {{ $enq->id }}</p>

                     <p style="margin-bottom: 3px;"><b>Name : </b> {{ $enq->name }}</p>

                     <p style="margin-bottom: 3px;"><b>Phone : </b> {{ $enq->phone }}</p>

                     <hr>

                     <p><a href="/enquiries/new" class="btn btn-success">Create New Enquiry</a></p>


                      
                </div>
            </div>
        </div>
    </div>


<br><br><br>
@endsection
