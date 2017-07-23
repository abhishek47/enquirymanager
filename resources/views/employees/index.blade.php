@extends('layouts.app')


@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <span class="breadcrumb-item active">Employees</span>
            </nav>
          
         </div>
        </div>
    
    <div class="card">
                <div class="card-block">
                <div class="card-title"> 
                     <div class="row">
                       <div class="col-md-9">
                          <h4>Employees </h4>
                        </div>
                        <div class="col-md-3">
                           <a href="{{ route('employees.create') }}" class="btn btn-success float-right" >Add New Employee</a>
                        </div>
                    </div>
                     
                   </div>

                <hr>
                    <table class="table">
                      <thead class="thead-inverse">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Role</th>
                          <th>Date Added</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                       @foreach($employees as $key => $employee)
                       
                            <tr id="employee-{{$employee->id}}">
                              <th scope="row">{{ $key+1 }}</th>
                              <td>{{ $employee->name }}</td>
                              <td>{{ $employee->role == 1 ? 'Manager' : 'Staff' }}</td>
                              <td>{{ $employee->created_at->diffForHumans() }}</td>
                              <td>
                                  <a href="{{ route('employees.edit', ['user' => $employee->id]) }}" class="btn btn-success btn-sm">Edit</a> 
                                  <a href="#" @click="deleteEmployee({{ $employee->id  }})" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>

</div>




@endsection





