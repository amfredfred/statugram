<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
 {
    public function referrals() {
        return view( 'referrals' );
    }

    public function withdraw() {
        return view( 'withdraw' );
    }
}
