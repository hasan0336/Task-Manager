<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Manager;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->position == 'teamlead'){
            return redirect()->route('teamlead_index');
        }
        elseif(Auth::user()->admin == 1)
            {
                return redirect()->route('admin_panel');
            }
        elseif(Auth::user()->position == 'employee')
                {
                    return redirect()->route('employee_panel');
                }
        elseif (Auth::user()->position == 'manager' && Auth::user()->admin == null) {

                    return redirect()->route('manager_panel');
                }
        else{
            return view('home');
        }
    }

   public function waiting()
   {
        return view('waiting');
   } 

   public function retrive_users_db()
    {
        $users  = DB::table('users')->get()->where('admin','!=',1);
        return view('admin_panel',['users'=>$users]);
    }
    public function admin_edit($id)
    {
        $admin = User::find($id);
        // dd($admin);
        return view('admin_edit',['admin'=>$admin]);
        //return view('manager/manager_edit',['user'=>$user]);
    }
    public function admin_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->approve = $request->get('approve');
        $user->save();


        return redirect('admin_panel');
    }
}
