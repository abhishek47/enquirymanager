@extends('layouts.app')

@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <a class="breadcrumb-item" href="/financers">Financers</a>
              <span class="breadcrumb-item active">Edit Financer - {{$financer->id}}</span>
            </nav>
          
         </div>
        </div>


    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><b>Edit Financer #{{$financer->id}}</b></div>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('financers.update', ['financer' => $financer->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Financer Company Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $financer->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                       


                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Update Financer
                                </button>

                               
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br><br>

    <div class="row justify-content-center">
        <div class="col col-md-12">
            <div class="card">
                
                <div class="card-block">
                    <div class="card-title"><b>Add Finance Managers</b></div>
                    <hr>
                    <form class="form-horizontal" method="POST" action="{{ route('finance_managers.store', ['financer' => $financer->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Financer Manager Name</label>

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                       


                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Add Finance Manager
                                </button>

                               
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br><br>

     <div class="card">
                <div class="card-block">
                <div class="card-title"> 
                     <div class="row">
                       <div class="col-md-9">
                          <h4>Finance Managers </h4>
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

                       @foreach($managers as $index => $manager)
                       
                            <tr id="manager-{{$manager->id}}">
                              <th scope="row">{{ $index }}</th>
                              <td>{{ $manager->name }}</td>
                              <td>{{ $manager->created_at->diffForHumans() }}</td>
                              <td>
                                  <a href="{{ route('finance_managers.edit', ['financer' => $financer->id,  'financeManager' => $manager->id]) }}" class="btn btn-success btn-sm">Edit</a> 
                                  <a href="#" @click="deleteManager({{ $financer->id }},{{ $manager->id  }})" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>

</div>

<br><br>



@endsection
