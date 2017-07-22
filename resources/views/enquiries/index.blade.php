@extends('layouts.app')


@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <span class="breadcrumb-item active">Enquiries</span>
            </nav>
          
         </div>
        </div>

    <div class="card">
                <div class="card-block">
   
    <div class="row">
                     <div class="col col-sm-8">
                      <h4>{{$title}} - {{ $date }} </h4>
                       
                     </div>
                     <div class="col col-sm-4">
                        <a href="{{ route('enquiries.create') }}" class="btn btn-success float-right">Add New Enquiry</a>
                     </div>

                   </div>
    </div>
    </div>

    <br>
    
    <div class="card">
                <div class="card-block">
                <div class="card-title"> 
                   <div class="row">
                     <div class="col col-sm-8">
                        
                     </div>
                     <div class="col col-sm-4">
                        <form method="GET" action="/enquiries" class="form-inline float-right">
                         @if(Request::has('cat'))
                          <input type="hidden" name="cat" value="{{ request('cat') }}">
                        @endif  
                          <input type="date" value="{{ $date }}" name="date" id="date" class="form-control" style="margin-right: 4px;">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                     </div>

                   </div>

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
                              <td>{{ $enquiry->vehicle->name }}</td>
                              <td><a target="_blank" href="{{ route('enquiries.show', ['enquiry' => $enquiry->id ])}}" class="btn btn-primary btn-sm">View</a> 
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

@endsection

