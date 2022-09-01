<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function registration(Request $request): ?object
    {
        response()->json([
            $request->validate([
                'phone' => 'required|numeric|digits_between:1,25',
                'email' =>'required|max:25',
                'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:25',
                'accept' => 'accepted',
            ])
        ]);

        return $this->create($request);
    }

    public function identify(Request $request): ?object
    {
        return response()->json([
            $request->validate([
                'card' => 'required|integer|digits_between:16,17',
                'cardholder' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:25',
                'mounth' => 'required|string|in:01,02,03,04,05,06,07,08,09,10,11,12',
                'year' => 'required|integer|between:22,99',
                'cvv' => 'required|integer|between:0,999',
            ])
        ]);
    }

    public function create(Request $request): ?object
    {
        try {
            if (User::where('email', $request->email)->exists()) {
                return response()->json([
                    'success' => false, 
                    'errors' => ['User with this email address already exists']
                ], 422);
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'customer_id' => rand(100000000,999999999)
            ]);

            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'success' => false, 
                'errors' => $exception->getMessage()
            ], 422);
        }
    }
}
