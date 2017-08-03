<?php

namespace App\Http\Controllers;

use  Carbon\Carbon;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class StatisticsController extends Controller
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

    public function index()
    {

         $data['employees'] = auth()->user()->company->employees()->where('role', 2)->get();

        $data['vehicles'] = auth()->user()->company->vehicles()->get();

        $data['e7days'] = auth()->user()->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))->count();

        $data['e30days'] = auth()->user()->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(30))->count();

        $data['e7daysSales'] = auth()->user()->company->enquiries()->where('status', 1)->where('created_at', '>', Carbon::now()->subDays(7))->count();

        $data['e30daysSales'] = auth()->user()->company->enquiries()->where('status', 1)->where('created_at', '>', Carbon::now()->subDays(30))->count();
       


       
        $data['totalEnquiriesVoid'] = auth()->user()->company->enquiries()->where('status', '0')->count();
        $data['totalEnquiriesConverted'] = auth()->user()->company->enquiries()->where('status', '1')->count();
        $data['totalEnquiriesCancelled'] = auth()->user()->company->enquiries()->where('status', '2')->count(); 
        

       

        
        

    	return view('statistics.index', $data);
    }
}
