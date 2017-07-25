<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Carbon\Carbon;

class FollowupsController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
         $this->middleware('company-registered');

         $this->middleware('is-staff');
        
    }


    public function index(Request $request)
    {
    	$date = Carbon::today()->format('Y-m-d');
    	
    	if($request->has('date'))
    	{
    		$date = (new Carbon($request->get('date')))->format('Y-m-d');
    	}

    	$followups = auth()->user()->company->enquiries()->where('contact_date', $date)->where('status', 0)->latest()->get();

    	return view('followups.index', compact('followups', 'date'));

    }
}
