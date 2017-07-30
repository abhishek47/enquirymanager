<?php

namespace App\Http\Controllers;

use App\Models\Financer;
use App\Models\FinanceManager;
use Illuminate\Http\Request;

class FinanceManagersController extends Controller
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

   
    


    public function store(Request $request, Financer $financer)
    {
    	$data = $request->all();

    	$data['company_id'] = auth()->user()->company->id;
       
        $financer->managers()->create($data);

        flash('New Finance Manager Added!')->success();

        return back();

    }


    public function edit(Financer $financer, FinanceManager $financeManager)
    {
        return view('financers.managers.edit', compact('financer', 'financeManager'));
    }

    

     public function update(Request $request,  Financer $financer, FinanceManager $financeManager)
    {
    	
        $financeManager->update($request->all());

        flash('Finance Manager Updated!')->success();

        return redirect('/financers/edit/' . $financer->id);

    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FinanceManager $financeManager)
    {
        $financeManager->delete();

       
        return 'success';

    }
}
