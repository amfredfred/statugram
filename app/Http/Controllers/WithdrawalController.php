<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;

class WithdrawalController extends Controller
 {
    public function withdrawFunds( Request $request ) {

        $request->validate( [
            'amount'=>'min:1|required|max:1000',
            'wtd-method'=>'required',
            'account'=>'required'
        ] );

        $canWtd = $request->user()->overview + $request->earned_from_downline;

        if ( $canWtd < $request->amount ) {
            return back()->with( 'message', 'Amount greater than balance!' );
        }

        $transacted = Transactions::create( [
            'amount'=>$request->amount,
            'method'=>$request->input( ( 'wtd-method' ) ),
            'account_details'=>$request->account,
            'currency'=>$request->currency,
            'user_id'=>$request->user()->id,
        ] );

        if ( $transacted ) {
            return back()->with( 'success', 'Withdrawal submited!' );
        }
        return back()->with( 'message', 'Somthing went wrong!' );
    }
}
