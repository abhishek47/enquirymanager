<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Carbon\Carbon;

class FollowupsController extends Controller
{
    public function index(Request $request)
    {
    	$date = Carbon::today()->format('Y-m-d');
    	
    	if($request->has('date'))
    	{
    		$date = (new Carbon($request->get('date')))->format('Y-m-d');
    	}

    	$followups = auth()->user()->company->enquiries()->where('contact_date', $date)->latest()->get();

    	return view('followups.index', compact('followups', 'date'));

    }
}
