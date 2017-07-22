@extends('layouts.app')

@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <span class="breadcrumb-item active">Edit Company</span>
            </nav>
          
         </div>
        </div>

    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><b>Edit Company Details</b></div>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('company.update') }}">
                    
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Company Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?   old('name') : $company->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="control-label">Address</label>

                            
                                <textarea id="address" class="form-control" name="address" required>{{ old('address') ? old('address') : $company->address }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                         <div class="form-group{{ $errors->has('phones') ? ' has-error' : '' }}">
                            <label for="phones" class="control-label">Phone Numbers(Add multiple numbers seperated by comma)</label>

                            
                                <input id="phones" type="text" class="form-control" name="phones" value="{{ old('phones') ? old('phones') : $company->phones }}" required>

                                @if ($errors->has('phones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phones') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                            <label for="fax" class="control-label">Fax</label>

                            
                                <input id="fax" type="text" class="form-control" name="fax" value="{{ old('fax') ? old('fax') : $company->fax }}">

                                @if ($errors->has('fax'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>

                            
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $company->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="control-label">Website</label>

                            
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') ? old('website') : $company->website }}">

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                          
                        </div>


                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Update Details
                                </button>

                               
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
