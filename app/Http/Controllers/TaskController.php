<?php

namespace App\Http\Controllers;


use App\Folder;
use App\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(int $id)
        {
            //$folders = Folder::all();
            $folders = Auth::user()->folders()->get();

            $current_folder = Folder::find($id);  

            if (is_null($current_folder)) {
                abort(404);
            }
            
            //$tasks = Task::where('folder_id', $current_folder->id)->get(); 
            $tasks = $current_folder->tasks()->get(); 

                return view('tasks/index', [
                    'folders' => $folders,
                    'current_folder_id' => $current_folder->id,
                    'tasks'=> $tasks
                ]);
        }
    
    public function showCreateForm(int $id)
    {
        return view('tasks/create', ['folder_id' => $id]);
    }


    public function create(int $id, CreateTask $request)
    {

    $current_folder = Folder::find($id);

    $task = new Task();
    $task->title = $request->title;
    $task->due_date = $request->due_date;

    $current_folder->tasks()->save($task);

    return redirect()->route('tasks.index', ['id' => $current_folder->id]);
    }

/**
 * GET /folders/{id}/tasks/{task_id}/edit
 */
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);
        
        return view('tasks/edit', ['task' => $task,]);
    }


//    public function Edit(int $id, int $task_id)
    public function Edit(int $id, int $task_id, Request $request)

    {
        $task = Task::find($task_id);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        
        $task->save();

        return redirect()->route('tasks.index', [ 'id' => $task->folder_id,]);
    }
}
