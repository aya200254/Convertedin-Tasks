<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Task;
class TaskController extends Controller
{

   
    public function create()
    {
       //  dd(User::admins()->get());
            $admins = User::where('role', 'admin')->get();
            User::admins()->get();
            //dump($admins);
            $users = User::where('role', 'user')->get();
            //dump($users);
            return view('task.create', compact('admins', 'users'));
           
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $validated = $request->validate([
            'assigned_by_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to_id' => 'required|exists:users,id',
        ]);
    
        Task::create($validated);
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }
  public function index()
        {
            $tasks = Task::with('assignedTo', 'assignedBy')->paginate(10);
          //  dump($tasks);
            return view('task.index', compact('tasks'));
        }

        public function statistics()
    {
        
        $topUsers = User::withCount('tasks')
                        ->orderBy('tasks_count', 'desc')
                        ->take(10)
                        ->get();

        return view('statistics', compact('topUsers'));
    }

}
