<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Requests\SubmitEnquiryRequest;
use Carbon\Carbon;

class EnquiriesController extends Controller
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
    public function index(Request $request)
    {
    	$date = Carbon::today()->format('Y-m-d');
    	
    	if($request->has('date'))
    	{
    		$date = (new Carbon($request->get('date')))->format('Y-m-d');
    	}

    	$enquiries = auth()->user()->company->enquiries()->whereDate('created_at', $date)->latest()->get();

    	return view('enquiries.index', compact('enquiries', 'date'));

    }

    /**
     * Show the enquiry form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {

        return view('enquiries.show', compact('enquiry'));

    }
    

    public function print(Enquiry $enquiry)
    {

        $invoice = \PDF::loadView('enquiries.print_view', compact('enquiry'));

        return $invoice->stream("invoice-" . $enquiry->id . ".pdf");
    }

    public function printview(Enquiry $enquiry)
    {

        //$invoice = \PDF::loadView('enquiries.print_view', compact('enquiry'));

        return view('enquiries.print_view', compact('enquiry'));
    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enquiries.new');
    }




    public function store(SubmitEnquiryRequest $request)
    {
    	$data = $request->all();

        $data['company_id'] = auth()->user()->company->id;
         
        $data['total'] = $data['vehicle_cost'] + $data['rto_charges'] + $data['insuarance_charges'] + $data['hpa_charges'] + $data['accessories'];

       
        $enq = auth()->user()->enquiries()->create($data);

        flash()->overlay('<h3>Enquiry ID : <b>' . $enq->id . '</b></h3>', 'Enquiry Recorded');

        return redirect('/home');
    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Enquiry $enquiry)
    {

        return view('enquiries.edit', compact('enquiry'));

    }


    public function update(SubmitEnquiryRequest $request, Enquiry $enquiry)
    {
    	$data = $request->all();

         
        $data['total'] = $data['vehicle_cost'] + $data['rto_charges'] + $data['insuarance_charges'] + $data['hpa_charges'] + $data['accessories'];

       
        $enquiry->update($data);

        flash('<b>Enquiry #' . $enquiry->id . '</b> Updated successfully!')->success();

        return redirect('/home');
    }

    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, Enquiry $enquiry, $status)
    {
        $enquiry->status = $status;
        
        $enquiry->save();
       
        return 'success';

    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Enquiry $enquiry)
    {
        $enquiry->delete();

       
        return 'success';

    }
}
