@extends('layouts.app')


@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <span class="breadcrumb-item active">Vehicles</span>
            </nav>
          
         </div>
        </div>
    
    <div class="card">
                <div class="card-block">
                <div class="card-title"> 
                     <div class="row">
                       <div class="col-md-9">
                          <h4>Vehicles </h4>
                        </div>
                        <div class="col-md-3">
                           <a href="{{ route('vehicles.create') }}" class="btn btn-success float-right" >Add New Vehicle</a>
                        </div>
                    </div>
                     
                   </div>

                <hr>
                    <table class="table">
                      <thead class="thead-inverse">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Date Added</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                       @foreach($vehicles as $vehicle)
                       
                            <tr id="vehicle-{{$vehicle->id}}">
                              <th scope="row">{{ $vehicle->id }}</th>
                              <td>{{ $vehicle->name }}</td>
                              <td>{{ $vehicle->created_at->diffForHumans() }}</td>
                              <td>
                                  <a href="{{ route('vehicles.edit', ['vehicle' => $vehicle->id]) }}" class="btn btn-success btn-sm">Edit</a> 
                                  <a href="#" @click="deleteVehicle({{ $vehicle->id  }})" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>

</div>


<div class="modal fade" id="newVehicleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('vehicles.store') }}">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Vehicle</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection





