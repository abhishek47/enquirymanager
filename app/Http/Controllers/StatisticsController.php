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

        $data['enquiriesConverted7days'] = auth()->user()->company->enquiries()->where('status', '1')->where('created_at', '>', Carbon::now()->subDays(7))
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
        
        $epwise = auth()->user()->company->enquiries()->select('user_id')->orderBy('user_id')->get()->groupBy('user_id');

        $data['employeeWiseEnquiries'] = array(); 

        foreach ($epwise as $key => $ep) {
            $data['employeeWiseEnquiries'][] = count($ep);
        }

        $epwiseC = auth()->user()->company->enquiries()->select('user_id')->where('status', '1')->orderBy('user_id')->get()->groupBy('user_id');

        $data['employeeWiseConvertedEnquiries'] = array(); 

        foreach ($epwiseC as $key => $ep) {
            $data['employeeWiseConvertedEnquiries'][] = count($ep);
        }

        $vwise = auth()->user()->company->enquiries()->select('vehicle_id')->orderBy('vehicle_id')->get()->groupBy('vehicle_id');

        $data['vehicleWiseEnquiries'] = array(); 

        foreach ($vwise as $key => $ep) {
            $data['vehicleWiseEnquiries'][] = count($ep);
        }

        $vwiseC = auth()->user()->company->enquiries()->select('vehicle_id')->where('status', '1')->orderBy('vehicle_id')->get()->groupBy('vehicle_id');

        $data['vehicleWiseConvertedEnquiries'] = array(); 

        foreach ($vwiseC as $key => $ep) {
            $data['vehicleWiseConvertedEnquiries'][] = count($ep);
        }
      


        $data['employees'] = auth()->user()->company->employees()->where('role', 2)->orderBy('id')->pluck('name')->toArray();

        $data['vehicles'] = auth()->user()->company->vehicles()->orderBy('id')->pluck('name')->toArray();

        
        

    	return view('statistics.index', $data);
    }
}
