@extends('layouts.app')

@section('content')

 @if(auth()->user()->isAdmin())
   @include('enquiries.edit.admin')
 @elseif(auth()->user()->role == 1)
   @include('enquiries.edit.manager')
 @endif
   
@endsection
