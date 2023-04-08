<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class GameController extends Controller
 {
    public function roll( Request $request ) {

        $LPT =  \Carbon\Carbon::now( 'WAT' );
        if ( !( ( int ) $LPT->timestamp >= ( int ) $request->user()->next_play_time ) ) {
            return redirect( 'dashboard' )->with( 'message', 'Wait for count down!' );
        }

        $won = rand ( 0.001*10, 0.5*10 ) / 100;
        $upline = $request->user()->referee;
        $request->user()->last_play_time =  $LPT->timestamp;
        $request->user()->save();
        $request->user()->next_play_time = $LPT->addHour()->timestamp ;
        $request->user()->overview += $won;
        $request->user()->save();

        if ( $upline ) {
            $upline =  User::where( 'ref_id', $upline )->first();
            if ( $upline ) {
                $upline->earned_from_downline += $won/3;
                $upline->save();
            }
        }

        return redirect( 'dashboard' )->with( 'success', $won );
    }
}
