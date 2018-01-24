<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DB;
use Auth;
use App\User;
use App\Manager;
use Carbon\Carbon; 
class EmployeeController extends Controller
{
    
     public function employee_home()
    {
    	$tasks = DB::table('tasks')->join('users','tasks.login_user_id','=','users.id')->select('tasks.*','users.name')->where('user_id','=',Auth::user()->id)->get();
    	 
    	 return view('employee/employee_Panel')->with('tasks',$tasks);
    	 //return view('employee/employee_Panel', compact('tasks', 'tasks'));

    }

    public function view_assigned_task($id)
    {
    	$task = DB::table('tasks')->where('id','=',$id)->first();
    	return view('employee/view_assigned_task')->with('task_info',$task);
    }

    public function employee_finish_task(Request $request ,$id)
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
        return redirect()->route('employee_panel', ['id'=>$task->user_id]);
    }
}
