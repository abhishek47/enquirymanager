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
   <h4>Follow Ups - {{ $date }} </h4>
    </div>
    </div>

    <br>
    
    <div class="card">
                <div class="card-block">
                <div class="card-title">
                  <div class="row">
                     <div class="col col-sm-8">
                     <form method="GET" action="/followups" class="form-inline" style="width: 100%;">
                          <select class="form-control" name="employee" style="margin-right: 4px;width: 200px;">
                            <option value="all" {{request('employee') == 'all' ? 'selected' : '' }}>All</option>
                            @foreach($employees as $employee)
                              <option value="{{ $employee->id }}" {{request('employee') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }} 
                              </option>
                            @endforeach
                          </select>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        
                     </div>
                     <div class="col col-sm-4">
                        <form method="GET" action="/followups" class="form-inline float-right">
                          <input type="date" value="{{ $date }}" name="date" id="date" class="form-control" style="margin-right: 4px;" readonly="true">
                          {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                        </form>
                     </div>
                  </div>   
                </div>

                <hr>
                    <table class="table">
                      <thead class="thead-inverse">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Enquiry To</th>
                          <th>Enquiry Date</th>
                          <th>Model</th>
                           @if(auth()->user()->isAdmin())
                          <th>Actions</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>

                       @foreach($followups as $enquiry)
                       
                            <tr id="enquiry-{{$enquiry->id}}">
                              <th scope="row">{{ $enquiry->id }}</th>
                              <td>{{ $enquiry->name }}</td>
                              <td>{{ $enquiry->phone }}</td>
                              <td>{{ $enquiry->creator->name }}</td>
                              <td>{{ $enquiry->created_at->format('d-m-Y') }}</td>
                              <td>{{ $enquiry->vehicle->name }}</td>
                              @if(auth()->user()->isAdmin())
                                <td>
                                     <a href="{{ route('enquiries.show', ['enquiry' => $enquiry->id ])}}" class="btn btn-primary btn-sm">View</a> 
                                    <a href="{{ route('enquiries.edit', ['enquiry' => $enquiry->id ])}}" class="btn btn-success btn-sm">Edit</a> 
                                    <a href="#" @click="deleteEnquiry({{ $enquiry->id  }})" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                              @endif
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                    
                    @if(Request::has('employee'))
                     <a target="_blank" href="/followups/print?employee={{request('employee')}}" class="btn btn-primary">Print List</a>
                    @else
                     <a target="_blank" href="/followups/print" class="btn btn-primary">Print List</a>
                    @endif
                </div>
            </div>



@endsection

