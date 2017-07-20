<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


    }


    public function register()
    {
       return view('company.create');
    }


    public function store(Request $request)
    {
    	auth()->user()->company()->create($request->all());

    	return redirect('home');
    }
}
