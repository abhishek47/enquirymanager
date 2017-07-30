@extends('layouts.app')


@section('content')
 <div class="row"> 
         <div class="col-12">

           <nav class="breadcrumb" style="background-color: #fff;">
              <a class="breadcrumb-item" href="/home">Home</a>
              <span class="breadcrumb-item active">Financers</span>
            </nav>
          
         </div>
        </div>
    
    <div class="card">
                <div class="card-block">
                <div class="card-title"> 
                     <div class="row">
                       <div class="col-md-9">
                          <h4>Financers </h4>
                        </div>
                        <div class="col-md-3">
                           <a href="{{ route('financers.create') }}" class="btn btn-success float-right" >Add New Financer</a>
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

                       @foreach($financers as $financer)
                       
                            <tr id="financer-{{$financer->id}}">
                              <th scope="row">{{ $financer->id }}</th>
                              <td>{{ $financer->name }}</td>
                              <td>{{ $financer->created_at->diffForHumans() }}</td>
                              <td>
                                  <a href="{{ route('financer.edit', ['financer' => $financer->id]) }}" class="btn btn-success btn-sm">Edit</a> 
                                  <a href="#" @click="deleteFinancer({{ $financer->id  }})" class="btn btn-danger btn-sm">Delete</a>
                              </td>
                            </tr>

                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>

</div>




@endsection





