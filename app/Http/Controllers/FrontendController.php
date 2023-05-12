<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use App\Models\Theam;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $tags = Tag::all();
        $users = User::all();
        $tasks = Task::all();
        $trashs = Task::onlyTrashed()->get();
        $theams = Theam::all();

        return view('index', compact('tags', 'users', 'tasks', 'trashs', 'theams'));
    }
}
