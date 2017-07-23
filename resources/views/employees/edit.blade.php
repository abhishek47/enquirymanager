@extends('layouts.app')

@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <a class="breadcrumb-item" href="/employees">Employees</a>
              <span class="breadcrumb-item active">Edit Employee - {{$employee->id}}</span>
            </nav>
          
         </div>
        </div>


    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><b>Edit Employee #{{$employee->id}}</b></div>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Employee Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $employee->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Employee Email</label>

                            
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $employee->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                         

                         <label class="custom-control custom-radio">
                          <input id="radio1" name="role" type="radio" value="1" class="custom-control-input" {{ $employee->role == 1 ? 'checked' : '' }}>
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Manager</span>
                        </label>
                        <label class="custom-control custom-radio">
                          <input id="radio2" name="role" type="radio" value="2" class="custom-control-input" {{ $employee->role == 2 ? 'checked' : '' }}>
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Staff</span>
                        </label>



                        
                        <hr>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Update Employee
                                </button>

                               
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
