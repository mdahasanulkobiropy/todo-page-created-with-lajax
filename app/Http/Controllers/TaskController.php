<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\TagTask;
use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //store method for task
    public function store(Request $request){

        if($request->title == ''){

            return response()->json([
                'titleError' => 'Task Title field is required!'
            ]);
        }

        if($request->user_id == ''){

            return response()->json([
                'user_idError' => 'Task Assignee field is required!'
            ]);

        }

        if($request->dueDate == ''){

            return response()->json([
                'dueDateError' => 'Task Due Date field is required!'
            ]);

        }

        if($request->tag_id == ''){

            return response()->json([
                'tag_idError' => 'Task Tag field is required!'
            ]);

        }

        if($request->description == ''){

            return response()->json([
                'descriptionError' => 'Task Description field is required!'
            ]);

        }

        $task = new Task();

        $task->title        = $request->title;
        $task->dueDate      = $request->dueDate;
        $task->description  = $request->description;
        $task->save();

        foreach($request->user_id as $user_id){

            $task_user = new TaskUser();

            $task_user->user_id = $user_id;
            $task_user->task_id = $task->id;
            $task_user->save();

        }
        foreach($request->tag_id  as $tag_id){

            $tag_task = new TagTask();

            $tag_task->tag_id = $tag_id;
            $tag_task->task_id = $task->id;
            $tag_task->save();

        }

        // $tasks = Task::latest()->get();
        $tasks = Task::all();
        $users = User::all();
        $tags = Tag::all();

        $view = view('tasks.task_lists', compact('tasks', 'users', 'tags'))->render();


        return response()->json([
            'success' => 'Task successfully store!',
            'alltask'  => $view,
        ]);
    }

    //update method for task
    public function update(Request $request, $id){

        if($request->title == ''){

            return response()->json([
                'titleError' => 'Task Update Title field is required!'
            ]);
        }

        if($request->user_id == ''){

            return response()->json([
                'user_idError' => 'Task Update Assignee field is required!'
            ]);

        }

        if($request->dueDate == ''){

            return response()->json([
                'dueDateError' => 'Task Update Due Date field is required!'
            ]);

        }

        if($request->tag_id == ''){

            return response()->json([
                'tag_idError' => 'Task Update Tag field is required!'
            ]);

        }

        if($request->description == ''){

            return response()->json([
                'descriptionError' => 'Task Update Description field is required!'
            ]);

        }

        $task = Task::find($id);

        $task->title        = $request->title;
        $task->dueDate      = $request->dueDate;
        $task->description  = $request->description;
        $task->update();

        TagTask::where('task_id', $id)->get()->each->delete();
        TaskUser::where('task_id', $id)->get()->each->delete();

        foreach($request->user_id as $user_id){

            $task_user = new TaskUser();

            $task_user->user_id = $user_id;
            $task_user->task_id = $task->id;
            $task_user->save();

        }
        foreach($request->tag_id  as $tag_id){

            $tag_task = new TagTask();

            $tag_task->tag_id = $tag_id;
            $tag_task->task_id = $task->id;
            $tag_task->save();

        }

        $tasks = Task::all();
        $users = User::all();
        $tags = Tag::all();
        $view = view('tasks.task_lists', compact('tasks', 'users', 'tags'))->render();

        return response()->json([
            'success' => 'Task successfully update!',
            'alltask' => $view,
        ]);
    }

    //delete method for task

    public function delete($id){

        $task = Task::find($id);

        // TagTask::where('task_id', $id)->get()->each->delete();
        // TaskUser::where('task_id', $id)->get()->each->delete();
        $task->delete();

        return response()->json([
            'success' => 'Task successfully Deleted!'
        ]);
    }

    //forcedelete method
    public function forcedelete($id){

        $task = Task::onlyTrashed()->find($id);

        TagTask::where('task_id', $id)->get()->each->delete();
        TaskUser::where('task_id', $id)->get()->each->delete();
        $task->forceDelete();

        return response()->json([
            'success' => 'Task successfully Deleted!'
        ]);
    }

    // restore method
    public function restore($id){

        $task = Task::onlyTrashed()->find($id);

        // TagTask::where('task_id', $id)->get()->each->delete();
        // TaskUser::where('task_id', $id)->get()->each->delete();
        $task->restore();

        return response()->json([
            'success' => 'Task successfully Restore!'
        ]);
    }

    //complete method
    public function complete($id){



        $task = Task::find($id);
        $task->cstatus = '1';
        $task->save();

        return response()->json([
            'success' => 'Task successfully Completed',
        ]);

    }
     //incomplete method
    public function incomplete($id){



        $task = Task::find($id);
        $task->cstatus = '0';
        $task->save();

        return response()->json([
            'success' => 'Task successfully Incompleted',
        ]);

    }
     //important method for task
    public function important($id){



        $task = Task::find($id);
        $task->imstatus = '1';
        $task->save();

        return response()->json([
            'success' => 'Task successfully Important!',
        ]);

    }
     //unimportant method for task
    public function unimportant($id){



        $task = Task::find($id);
        $task->imstatus = '0';
        $task->save();

        return response()->json([
            'success' => 'Task successfully Unimportant!',
        ]);

    }


    //i
}
