<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Verifications;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Verification Controller
    |--------------------------------------------------------------------------
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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

    public function verification(Request $request)
    {
        response()->json([
            $request->validate([
                'code' => 'required|integer|between:0,99999',
            ])
        ]);

        return $this->check($request);
    }

    public function check(Request $request)
    {
        if ($code = Verifications::where('code', $request->code)->first()) {
            $code->delete();

            return response()->json(['success' => true]);
        }

        return response()->json([
            'result' => false,
            'errors' => ['Code not found']
        ], 422);
    }
}
