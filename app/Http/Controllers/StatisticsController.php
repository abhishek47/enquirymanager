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
        $enquiries7days = Enquiry::where('created_at', '>', Carbon::now()->subDays(7))
                         ->where(\DB::raw('DATE(created_at)', '<', Carbon::now()->format('d-m-Y')))->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        }); 


    	return view('statistics.index');
    }
}
