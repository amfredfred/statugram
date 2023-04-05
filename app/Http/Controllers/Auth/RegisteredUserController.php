<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
 {
    /**
    * Display the registration view.
    */

    public function create(): View
 {
        return view( 'auth.register' );
    }

    /**
    * Handle an incoming registration request.
    *
    * @throws \Illuminate\Validation\ValidationException
    */

    public function store( Request $request ): RedirectResponse
 {
        $request->validate( [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:'.User::class ],
            'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
        ] );

        $refLink = Str::upper( Str::random( 4 ) );

        $user = User::create( [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
            'referee'=> $request->referee,
            'ref_link'=> route( 'register' ).'?ref='.$refLink,
            'ref_id' => $refLink
        ] );

        if ( $request->referee ) {
            $upline = User::where( 'ref_id', $request->referee );
            if ( $upline ) {
                $upline->downlines = [ ...$upline->downlines, $user->ref_id ];
                $upline->save();
            }
        }

        event( new Registered( $user ) );

        Auth::login( $user );

        return redirect( RouteServiceProvider::HOME );
    }
}
