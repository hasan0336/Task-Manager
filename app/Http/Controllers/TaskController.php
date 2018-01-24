<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;
use Auth;
use App\User;
use App\Manager;
use Carbon\Carbon; 
class TaskController extends Controller
{
    //

    public function manager_assigned_task($id)
    {
    	$user = User::find($id);
    	// print_r($user);
    	// exit;


    	$login_id = Auth::user()->id;

         
    	$tasks  = DB::table('tasks')->join('users','tasks.user_id','=','users.id')->select('tasks.*','users.id as id','tasks.id as task_id','users.name')->where('user_id','=',$user['id'])
    										->where('login_user_id','=',$login_id)->get();
                                             // dd($tasks);
    	return view('manager/assigned_task',['tasks'=>$tasks]);
    }

    public function manager_edit_task($id)
    {
    	$task = Task::find($id);
   		//dd($user);
   		//$users=Auth::user()->id;
    	// dd($task);
   		return view('manager/manager_edit_task',['task'=>$task]);
    }

    public function manager_update_task(Request $request, $id)
    {
    	 $task = Task::find($id);

        // print_r($user['name']);exit;
        $task->task_name = $request->get('task_name');
        $task->task_description = $request->get('task_description');
       
        $task->finished_at =  Carbon::parse($request->finished_at);
       $task->rating = $request->get('rate');
        $task->save();
        return redirect('manager/assigned_task/'.$id);
    }


    public function manager_view_assign_task($id)
    {
        

        $task_info = DB::table('tasks')->where('id','=',$id)->first();
        $data = json_decode(json_encode($task_info), true);
        //json is use to convert task_info as string stored in $data
        // dd($data);
        return view('manager/manager_view_assign_task', compact('task_info', 'data'));
        
        //return view('teamslead/teamlead_view_task',['task_info',$task_info]);
    }

    public function delete_manager_assigned_task($id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect()->back();

    }


    public function teamlead_assigned_task($id)
    {    	
    	$user = User::find($id);
    	$login_id = Auth::user()->id;
    	$tasks  = DB::table('tasks')->join('users','tasks.user_id','=','users.id')
                                    ->select('tasks.*','users.name')
                                    ->where('user_id','=',$user['id'])
                                    ->where('login_user_id','=',$login_id)
                                    ->get();                               
    	return view('teamslead/assigned_task',['tasks'=>$tasks]);
    }

     public function teamlead_edit_task($id)
    {
    	$task = Task::find($id);
   		//dd($user);
   		//$users=Auth::user()->id;
    	// dd($task)
   		return view('teamslead/teamlead_edit_task',['task'=>$task]);
    }

    public function teamlead_update_task(Request $request, $id)
    {
    	$task = Task::find($id);

        // print_r($user['name']);exit;
        $task->task_name = $request->get('task_name');
        $task->task_description = $request->get('task_description');
        $task->rating = $request->get('rate');

        $task->save();
        return redirect('teamslead/assigned_task/'.$task->user_id);
    }

    public function task_assigned_to_teamlead($id)
    {
        $task = Task::find($id);
        $login_id = Auth::user()->id;

        $login_task = DB::table('tasks')->join('users','tasks.login_user_id','=','users.id')->select('tasks.*','users.name')->where('user_id','=',Auth::user()->id)->get();

        // dd($login_task);
        return view('teamslead/task_assigned_to_teamlead',['login_tasks'=>$login_task]);

    }

    public function teamlead_view_task($id)
    {
        

        $task_info = DB::table('tasks')->where('id','=',$id)->first();
        return view('teamslead/teamlead_view_task', compact('task_info', 'task_info'));
        
        //return view('teamslead/teamlead_view_task',['task_info',$task_info]);
    }

    public function teamlead_finish_task(Request $request ,$id)
    {
        //dd(123);
        $task = Task::find($id);
        // dd($task);
        $task->task_finished_at = Carbon::parse(strtotime($request->finish));

        $task->save();
        //dd(123);
        if($task->task_finished_at < $task->finished_at)
        {
                $task->complete = "complete";
                $task->save();
        }
        elseif($task->task_finished_at > $task->finished_at)
        {
                $task->complete = "delyed";
                $task->save();
        }
        else
        {
            $task->complete = "pending";
            $task->save();
        }
        //$this->task_assigned_to_teamlead($id);
        return redirect()->route('task_assigned_to_teamlead', ['id'=>$task->user_id]);
    }

    public function task_assigned_to_employee($id)
    {
         $task = Task::find($id);
        $login_id = Auth::user()->id;

        $login_task = DB::table('tasks')->join('users','tasks.login_user_id','=','users.id')->select('tasks.*','users.name')->where('user_id','=',Auth::user()->id)->get();
        // dd($login_task);
        // dd($login_task);
        return view('employee/employee_panel',['login_tasks'=>$login_task]);
    }

     public function teamlead_view_assign_task($id)
    {
        

        $task_info = DB::table('tasks')->where('id','=',$id)->first();
        $data = json_decode(json_encode($task_info), true);
        return view('teamslead/teamlead_view_assign_task', compact('task_info', 'task_info'));
        
        //return view('teamslead/teamlead_view_task',['task_info',$task_info]);
    }

    public function delete_teamlead_assigned_task($id)
    {
        $task = Task::find($id);
        
        $task->delete();

        return redirect()->back();

    }
}
