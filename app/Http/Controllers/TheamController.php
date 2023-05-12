<?php

namespace App\Http\Controllers;

use App\Models\Theam;
use Illuminate\Http\Request;

class TheamController extends Controller
{

    public function theam($id){

        $theam = Theam::find($id);
        $theam->theam = '0';

        $theam->save();
        return response()->json([
            'success' => 'Task successfully Change Theam!',
        ]);

    }
    public function theamcolor($id){

        $theam = Theam::find($id);
        $theam->theam = '1';

        $theam->save();
        return response()->json([
            'success' => 'Task successfully Change Theam!',
        ]);

    }
}
