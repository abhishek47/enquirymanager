<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['date'] = Carbon::today()->format('Y-m-d');

        $data['enquiries'] = auth()->user()->company->enquiries()->latest()->limit(10)->get();

        $data['enquiriesCount'] =  auth()->user()->company->enquiries()->count();

        $data['enquiriesSold'] = auth()->user()->company->enquiries()->where('status', 1)->count();

        $data['enquiriesCancelled'] = auth()->user()->company->enquiries()->where('status', 2)->count();

        $data['followups'] = auth()->user()->company->enquiries()->where('contact_date', $data['date'])->count();

        $data['enquiriesToday'] = auth()->user()->company->enquiries()->whereDate('created_at', Carbon::today()->toDateString())->count();

     


        return view('home', $data);
    }
}
