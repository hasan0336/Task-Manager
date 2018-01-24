<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\User;
use App\Manager;
use App\Task;
use Carbon\Carbon;  
use Mail;
use App\Mail\NewMail;

class TeamleadController extends Controller
{
    // public function teamlead_home()
    // {
    // 	return view('teamslead/teamlead');
    // }

    public function retrive_users_db()
    {




      
    	$users  = DB::table('users')->get()->where('position','!=','manager')
    										->where('position','!=','teamlead')
    										->where('admin','!=',1);



    	return view('teamslead/teamlead',['users'=>$users]);
    }

    public function edit_page($id)
    {
    	$user = User::find($id);

    	return view('teamslead/teamlead_edit',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
    	$user = User::find($id);

    	$user->approve = $request->get('approve');
    	$user->save();

    	return redirect('teamlead');
    }

    public function task_form($id)
    {
      //    $user = User::find($id);
      // dd($user);
        $task = Task::find($id);

        $user_tasks = DB::table('tasks')->join('users','tasks.user_id','=','users.id')->select('tasks.*','users.*')->where('user_id','=', $id)->get();
        $total_rating = DB::table('tasks')->select(DB::raw('SUM(rating) as total_rating'))->where('user_id','=',$id)->first();
        $counts = DB::table('tasks')->where('user_id','=',$id)->where('rating','!=',null)->count();
         if($counts == 0)
          {
            $overall_rating = 'not rated';
            return view('teamslead/assign_task',['user'=>$user_tasks, 'overall_rating'=> $overall_rating]);
          }          
          else
          {
            $count_mul_5 = $counts * 5;

            $overall_rating = ($total_rating->total_rating/$count_mul_5)*5;

            // dd($counts);

            return view('teamslead/assign_task',['user'=>$user_tasks, 'overall_rating'=> $overall_rating]);    
          }
        
    }

    public function assign_task(Request $request,$id)
    {
      
      $user = User::find($id);
      $task = new Task ;
      $task->task_name = $request->get('task_name');
      $task->task_description = $request->get('task_description');
      $task->user_id = $request->get('user_id');
      $task->login_user_id = Auth::user()->id;
      $task->priority = $request->get('priority');
      $task->finished_at =  Carbon::parse($request->finished_at);

      $u = $task->save();
      // dd($u);

      $user_name  = DB::table('users')->where('id','=',$request->get('user_id'))
                        ->first(['name','email']);
      // dd($user_name->email);
       $email = $user_name->email;
       $names = $user_name->name; 
       $login_user = Auth::user()->name;

      

       $data['data'] = array(
            'task_name' => $request->get('task_name'),
            'task_description' => $request->get('task_description'),
            'priority' => $request->get('priority'),
            'finished_at' => Carbon::parse($request->finished_at)
            ); 
       //dd($data);
             $d = Mail::send('teamslead/teamlead_view_assign_task', $data, function($message) use ($email,$names,$login_user)
              {
                    $message->to($email, $names)
                                  ->subject('New task from'.$login_user);
                    $message->from('hasan.aimviz@gmail.com',$login_user);
                      });


      return redirect('teamlead');



    }

    
   
}
