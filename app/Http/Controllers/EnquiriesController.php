<?php

namespace App\Http\Controllers;

use App\User;
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

        $this->middleware('is-staff')->except('create', 'store', 'recorded');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $title = 'All Enquiries - ';

        $date = '';
        
        if(auth()->user()->isAdmin()) {
            $enquiries = auth()->user()->company->enquiries();
        } else {
          $enquiries = auth()->user()->company->enquiries()->where('status', '-1');
        }
        if($request->has('phone'))
        {
        	$enquiries->where('phone', $request->get('phone'));
        	$title = 'Enquiries by "' . $request->get('phone') . '"';
        }

        if($request->has('employee') && $request->get('employee') != 'all')
        {
            $enquiries->where('user_id', $request->get('employee'));
            $title = 'Enquiries To "' . User::where('id', $request->get('employee'))->first()->name . '"';
        }
    	
        if($request->has('date'))
    	{
    		$date = (new Carbon($request->get('date')))->format('Y-m-d');
    		$enquiries = $enquiries->whereDate('created_at', $date);
           
    	}
        
         
    	
        if($request->has('cat'))
        {
            $cat = $request->get('cat');
            
            if($cat == 1)
            {
                $title = 'Converted Enquiries';
            } else {
                $title = 'Cancelled Enquiries';
            }
            $enquiries = $enquiries->where('status', $cat);
        }

        $enquiries = $enquiries->latest()->get();

        $employees = User::where('company_id', auth()->user()->company->id)->where('role', 2)->get();

	return view('enquiries.index', compact('enquiries', 'date', 'title', 'employees'));

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
    	$vehicles = auth()->user()->company->vehicles;
        $financers = auth()->user()->company->financers; 
        return view('enquiries.new', compact('vehicles', 'financers'));
    }




    public function store(SubmitEnquiryRequest $request)
    {
    	$data = $request->all();

        $data['company_id'] = auth()->user()->company->id;
         
        $data['total'] = $data['vehicle_cost'] + $data['rto_charges'] + $data['insuarance_charges'] + $data['hpa_charges'] ;

       
        $enq = auth()->user()->enquiries()->create($data);

        $message = "Thank You for making an enquiry at Shivang Automobiles!Your Enquiry ID is : {$enq->id}.Save this is ID for further reference at Shivang Automobiles!";

        $client = new \GuzzleHttp\Client();
        $res = $client->get('https://49.50.67.32/smsapi/httpapi.jsp?username=SHIVAN03&password=SHIVAN03@123&from=SHIVAN&to=' 
             . $data['phone'] . '&text=' . $message
                   );


      
        if(auth()->user()->role < 2){
            flash('<h3>Enquiry Recorded!Enquiry ID : <b>' . $enq->id . '</b></h3>')->success();
            return redirect('/enquiries');
        } else {
            return redirect('/enquiries/recorded/' . $enq->id);
        }
        
    }
    
    public function recorded(Enquiry $enquiry)
    {
       $enq = $enquiry;
        return view('enquiries.recorded', compact('enq'));
    }


    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Enquiry $enquiry)
    {
        $financers = auth()->user()->company->financers; 
    	$vehicles = auth()->user()->company->vehicles;
        return view('enquiries.edit', compact('enquiry', 'vehicles', 'financers'));

    }


    public function update(SubmitEnquiryRequest $request, Enquiry $enquiry)
    {
    	
        $enquiry->update($request->all());

        flash('<b>Enquiry #' . $enquiry->id . '</b> Updated successfully!')->success();

        return back();
    }

    /**
     * Show the enquiry creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, Enquiry $enquiry, $status)
    {
        if($status == 0)
        {
            $enquiry->void_reason = $request->get('reason');
        }

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
