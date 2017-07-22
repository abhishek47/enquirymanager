@extends('layouts.app')

@section('content')

 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <a class="breadcrumb-item" href="/vehicles">Vehicles</a>
              <span class="breadcrumb-item active">New Vehicle</span>
            </nav>
          
         </div>
        </div>

    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><b>Add New Vehicle</b></div>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('vehicles.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Vehicle Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        


                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Add Vehicle
                                </button>

                               
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
