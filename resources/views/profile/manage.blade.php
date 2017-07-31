@extends('layouts.app')

@section('content')
<div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <a class="breadcrumb-item" href="/enquiries">Enquiries</a>
              <span class="breadcrumb-item active">New</span>
            </nav>
          
         </div>
        </div>

    <div class="row justify-content-center">
        <div class="col col-md-8">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><h2>Manage Profile</h2></div>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : auth()->user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>

                           
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : auth()->user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-success">
                                    Update Profile
                                </button>
                            
                        </div>


                        <hr>

                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="control-label">Password</label>

                           
                                <input id="old_password" type="old_password" class="form-control" name="old_password" required>

                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paold_passwordssword') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

                           
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>

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
    </div>

@endsection