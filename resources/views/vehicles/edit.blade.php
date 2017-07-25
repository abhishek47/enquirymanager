@extends('layouts.app')

@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <a class="breadcrumb-item" href="/vehicles">Vehicles</a>
              <span class="breadcrumb-item active">Edit Vehicle - {{$vehicle->id}}</span>
            </nav>
          
         </div>
        </div>


    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><b>Edit Vehicle #{{$vehicle->id}}</b></div>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('vehicles.update', ['vehicle' => $vehicle->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Vehicle Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $vehicle->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('vehicle_cost') ? ' has-error' : '' }}">
                            <label for="vehicle_cost" class="control-label">Vehicle Cost</label>

                            
                                <input id="vehicle_cost" type="text" class="form-control" name="vehicle_cost" 
                                 value="{{ old('vehicle_cost') ? old('vehicle_cost') : $vehicle->vehicle_cost }}" required autofocus>

                                @if ($errors->has('vehicle_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vehicle_cost') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                         <div class="form-group{{ $errors->has('rto_charges') ? ' has-error' : '' }}">
                            <label for="rto_charges" class="control-label">R.T.O Charges</label>

                            
                                <input id="rto_charges" type="text" class="form-control" name="rto_charges" 
                                  value="{{ old('rto_charges') ? old('rto_charges') : $vehicle->rto_charges }}" required autofocus>

                                @if ($errors->has('rto_charges'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rto_charges') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                         <div class="form-group{{ $errors->has('insuarance_charges') ? ' has-error' : '' }}">
                            <label for="insuarance_charges" class="control-label">Insuarance Charges</label>

                            
                                <input id="insuarance_charges" type="text" class="form-control" name="insuarance_charges" value="{{ old('insuarance_charges') ? old('insuarance_charges') : $vehicle->insuarance_charges }}" required autofocus>

                                @if ($errors->has('insuarance_charges'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('insuarance_charges') }}</strong>
                                    </span>
                                @endif
                          
                        </div>


                        


                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Update Vehicle
                                </button>

                               
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
