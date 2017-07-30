<?php

namespace App\Http\Controllers;

use App\Models\Financer;
use Illuminate\Http\Request;

class FinancersController extends Controller
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

    public function index(Request $request)
    {
        $financers = auth()->user()->company->financers;
        return view('financers.index', compact('financers'));
    }

    public function create()
    {
        return view('financers.new');
    }


    public function store(Request $request)
    {
        auth()->user()->company->financers()->create($request->all());

        flash('New Financer Added!')->success();

        return redirect('financers');

    }


    public function edit(Financer $financer)
    {
        $managers = $financer->managers;
        return view('financers.edit', compact('financer', 'managers'));
    }

    

     public function update(Request $request, Financer $financer)
    {
        $financer->update($request->all());

        flash('Financer Updated!')->success();

        return redirect('financers');

    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Financer $financer)
    {
        $financer->delete();

       
        return 'success';

    }
}
