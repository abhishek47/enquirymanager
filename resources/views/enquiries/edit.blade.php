@extends('layouts.app')

@section('content')

 @if(auth()->user()->isAdmin())
   @include('enquiries.edit.admin')
 @elseif(auth()->user()->role == 1)
   @include('enquiries.edit.manager')
 @endif


 <!-- Modal -->
<div class="modal fade" id="voidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason for Void</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select id="void_reason" class="form-control">
        	<option value="Technical Reason">Technical Reason</option>
        	<option value="Trial Enquiry">Trial Enquiry</option>
        	<option value="Other">Other</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="updateEnquiryStatus({{ $enquiry->id }}, 0)">Save</button>
      </div>
    </div>
  </div>
</div>
   
@endsection
