<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehiclesController extends Controller
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

    public function index(Request $request)
    {
 		$vehicles = auth()->user()->company->vehicles;
    	return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
    	return view('vehicles.new');
    }


    public function store(Request $request)
    {
    	auth()->user()->company->vehicles()->create($request->all());

    	flash('New Vehicle Added!')->success();

    	return redirect('vehicles');

    }


    public function edit(Vehicle $vehicle)
    {
    	return view('vehicles.edit', compact('vehicle'));
    }


     public function update(Request $request, Vehicle $vehicle)
    {
    	$vehicle->update($request->all());

    	flash('Vehicle Updated!')->success();

    	return redirect('vehicles');

    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vehicle $vehicle)
    {
        $vehicle->delete();

       
        return 'success';

    }
}
