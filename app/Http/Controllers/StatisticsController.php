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
        $data['enquiries7days'] = auth()->user()->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))
                         ->where(\DB::raw('DATE(created_at)', '<', Carbon::now()->format('d-m-Y')))->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        }); 

        $data['enquiries7Months'] = auth()->user()->company->enquiries()->where('created_at', '>', Carbon::now()->subMonths(7))
                         ->where(\DB::raw('MONTH(created_at)', '<', Carbon::now()->format('m')))->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        }); 

        $data['enquiriesConverted7Months'] = auth()->user()->company->enquiries()->where('status', '1')->where('created_at', '>', Carbon::now()->subMonths(7))
                         ->where(\DB::raw('MONTH(created_at)', '<', Carbon::now()->format('m')))->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        }); 

        $data['totalEnquiriesVoid'] = auth()->user()->company->enquiries()->where('status', '0')->count();
        $data['totalEnquiriesConverted'] = auth()->user()->company->enquiries()->where('status', '1')->count();
        $data['totalEnquiriesCancelled'] = auth()->user()->company->enquiries()->where('status', '2')->count(); 

        $data['employeeWiseEnquiries'] = auth()->user()->company->enquiries()->get()->groupBy('user_id'); 
        $data['employeeWiseConvertedEnquiries'] = auth()->user()->company->enquiries()->where('status', '1')->get()->groupBy('user_id'); 

        $data['vehicleWiseEnquiries'] = auth()->user()->company->enquiries()->get()->groupBy('vehicle_id'); 
        $data['vehicleWiseConvertedEnquiries'] = auth()->user()->company->enquiries()->where('status', '1')->get()->groupBy('vehicle_id'); 
        


    	return view('statistics.index');
    }
}
