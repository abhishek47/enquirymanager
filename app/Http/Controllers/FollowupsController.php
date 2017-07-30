<?php

namespace App\Http\Controllers;

use App\User;
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

        $followups =  auth()->user()->company->enquiries()->where('contact_date', $date)->where('status', 0)->latest();

        if($request->has('employee') && $request->get('employee') != 'all')
        {
            $followups->where('user_id', $request->get('employee'));
        }

    	$followups = $followups->get();

        $employees = User::where('company_id', auth()->user()->company->id)->where('role', 2)->get();

    	return view('followups.index', compact('followups', 'date', 'employees'));

    }

    /**
     * Show the enquiry form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $date = Carbon::today()->format('Y-m-d');

        $followups =  auth()->user()->company->enquiries()->where('contact_date', $date)->where('status', 0)->latest();

        if($request->has('employee') && $request->get('employee') != 'all')
        {
            $followups->where('user_id', $request->get('employee'));
        }

        return view('followups.print', compact('followups', 'date'));

    }
}
