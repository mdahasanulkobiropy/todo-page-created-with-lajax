<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request){

        if($request->name == ''){
            return response()->json([
                'name' => 'Tag name field is required!'
            ]);
        }

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->save();

        $tags = Tag::all();

        $view =view('tags.tag_lists', compact('tags'))->render();

        return response()->json([
            'success' => 'Tag name successfully store!',
            'alltag' => $view,
        ]);
    }




}
