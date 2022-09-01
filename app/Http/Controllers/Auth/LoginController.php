<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UserCodeNotification;
use App\User;
use App\Verifications;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        response()->json([
            $request->validate([
                'customer_id' => 'required|integer|between:0,999999999',
            ])
        ]);

        return $this->check($request);
    }

    public function check(Request $request)
    {
        if ($user = User::where('customer_id', $request->get('customer_id'))->first()) {
            $code = Verifications::create([
                'user_id' => $user->id,
                'code' => rand(00000, 99999),
            ]);

            return response()->json([
                'result' => true,
                'user' => $user,
                'message' => $code->code
            ]);
        }

        return response()->json([
            'result' => false,
            'errors' => ['User not found']
        ], 422);
    }
}
