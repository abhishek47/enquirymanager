<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
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

    	$employees = auth()->user()->company->employees();
       
        if($request->has('role'))
        {
            $role = $request->get('role');
            
            if($role == 1)
            {
                $title = 'Managers';
            } else {
                $title = 'Staff';
            }
            $employees = $employees->where('role', $role);
        }

        $employees = $employees->get();

    	return view('employees.index', compact('employees', 'date', 'title'));

    }

    /**
     * Show the User form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('employees.show', compact('user'));

    }
    

    /**
     * Show the User creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.new');
    }




    public function store(Request $request)
    {
    	$data = $request->all();
 
        $emp = User::findOrCreate($data);

        $emp->company_id = auth()->user()->company->id;

        $emp->save();

        flash('Employee Added successfully')->success();

        return redirect('/employees');
    }


    /**
     * Show the User creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
    	$employee = $user; 
    	return view('employees.edit', compact('employee'));
	}


    public function update(SubmitUserRequest $request, User $user)
    {
    	$data = $request->all();

        $user->update($data);

        flash('<b>Employee #' . $user->id . '</b> Updated successfully!')->success();

        return back();
    }

    /**
     * Show the User creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, User $user, $status)
    {
        $user->role = $role;
        
        $user->save();
       
        return 'success';

    }


    /**
     * Show the User creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return 'success';

    }
}
