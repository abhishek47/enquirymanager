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

        $this->middleware('is-staff')->only('index');
        
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

        $data['followups'] = auth()->user()->company->enquiries()->where('contact_date', $data['date'])->where('status', -1)->count();

        $data['enquiriesToday'] = auth()->user()->company->enquiries()->whereDate('created_at', Carbon::today()->toDateString())->count();

     


        return view('home', $data);
    }


    public function profile()
    {
        return view('profile.manage');
    }

    public function updateProfile(Request $request)
    {
         $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email'
        ]);

        auth()->user()->name = $request->get('name');
        auth()->user()->email = $request->get('email');

        auth()->user()->save();

        flash('Your Profile was updated successfully!')->success();

        return back();
    }
    
    public function password(Request $request)
    {
         $this->validate($request, [
          'old_password' => 'required',
          'password' => 'required|string|min:6|confirmed'
        ]);

      $old_password = $request->get('old_password');
      $password = $request->get('password');
      if(!\Hash::check($old_password, auth()->user()->password))
      {
          flash('Please enter your current password correct!')->error();
          return back();
      } 

      auth()->user()->password = bcrypt($password);
      auth()->user()->save();

      flash('Your Password was updated successfully!')->success();
        return back();
    }



}
