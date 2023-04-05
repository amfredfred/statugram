<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class GameController extends Controller
 {
    public function roll( Request $request ) {

        $won = rand ( 0.001*10, 0.5*10 ) / 50;
        $updatedDateFormat =  \Carbon\Carbon::now();
        $request->user()->last_play_time = $updatedDateFormat;
        $request->user()->save();

        return redirect('dashboard')->with( 'success', $won );

    }
}
