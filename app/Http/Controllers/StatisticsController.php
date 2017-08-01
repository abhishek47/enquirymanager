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

         $data['employees'] = auth()->user()->company->employees()->where('role', 2)->orderBy('id')->pluck('name')->toArray();

        $data['vehicles'] = auth()->user()->company->vehicles()->orderBy('id')->pluck('name')->toArray();

        $e7days = auth()->user()->company->enquiries()->where('created_at', '>', Carbon::now()->subDays(7))
                         ->where(\DB::raw('DATE(created_at)', '<', Carbon::now()->format('d-m-Y')))->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        }); 

        $data['enquiries7days'] = array();

        

        foreach ($e7days as $key => $day) {
            $data['enquiries7days'][] = count($day);
        }




        $e7daysConverted = auth()->user()->company->enquiries()->where('status', '1')->where('created_at', '>', Carbon::now()->subDays(7))
                         ->where(\DB::raw('DATE(created_at)', '<', Carbon::now()->format('d-m-Y')))->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        }); 

        $data['enquiriesConverted7Days'] = array();

        foreach ($e7daysConverted as $key => $day) {
            $data['enquiriesConverted7Days'][] = count($day);
        }

       
        $data['totalEnquiriesVoid'] = auth()->user()->company->enquiries()->where('status', '0')->count();
        $data['totalEnquiriesConverted'] = auth()->user()->company->enquiries()->where('status', '1')->count();
        $data['totalEnquiriesCancelled'] = auth()->user()->company->enquiries()->where('status', '2')->count(); 
        
      

        $data['employeeWiseEnquiries'] = array(); 

        foreach ($data['employees'] as $employee) {
            $data['employeeWiseEnquiries'][] = $employee->enquiries()->count();
        }

       
        $data['employeeWiseConvertedEnquiries'] = array(); 

        foreach ($data['employees'] as $employee) {
            $data['employeeWiseConvertedEnquiries'][] = $employee->enquiries()->where('status', 1)->count();
        }


        $data['vehicleWiseEnquiries'] = array(); 

        foreach ($data['vehicles']  as $vehicle) {
            $data['vehicleWiseEnquiries'][] = $vehicle->enquiries()->count();
        }

        
        $data['vehicleWiseConvertedEnquiries'] = array(); 

        foreach ($data['vehicles']  as $vehicle) {
            $data['vehicleWiseConvertedEnquiries'][] = $vehicle->enquiries()->where('status', 1)->count();
        }
      


       

        
        

    	return view('statistics.index', $data);
    }
}
