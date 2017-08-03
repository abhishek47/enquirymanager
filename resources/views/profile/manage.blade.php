@extends('layouts.app')

@section('content')

@if($errors->has('password') || $errors->has('old_password'))
 <div class="alert alert-danger alert-important }}" role="alert">
           
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            

            There was some error changing your password please try again.
 </div>
@endif 

<div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <span class="breadcrumb-item active">Profile</span>
            </nav>
          
         </div>
        </div>

    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><h2>Manage Profile</h2></div>
                    <form class="form-horizontal" method="POST" action="{{ route('user.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name" class="control-label">Name</label>

                            
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}" name="name" value="{{ old('name') ? old('name') : auth()->user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                           
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') ? old('email') : auth()->user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-success">
                                    Update Profile
                                </button>
                            
                        </div>


                    

                    </form>
                </div>
            </div>
             
            <br><br>       

            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><h2>Manage Password</h2></div>

                    <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">

                    {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label for="old_password" class="control-label">Old Password</label>

                           
                                <input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' form-control-danger' : '' }}" name="old_password" required>

                                @if ($errors->has('old_password'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('paold_passwordssword') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password" class="control-label"> New Password</label>

                           
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm New Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-success">
                                    Update Password
                                </button>
                            
                        </div>
                    </form>

                </div>

            </div>    
        </div>


        <br><br>
    </div>
    <br><br>

@endsection
