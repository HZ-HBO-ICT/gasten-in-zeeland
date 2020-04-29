<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;


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
    use EncryptableDbAttribute;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){

        return view('auth/register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'kvk_number'=>['required','integer','max:8'],
            'lodging_name' => ['required', 'string', 'max:255'],
            'lodging_max' => ['required', 'integer', 'min:0'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'kvk_number' => $data['kvk_number'],
            'lodging_name' => $data['lodging_name'],
            'lodging_max' => $data['lodging_max'],
            'password' => Hash::make($data['password']),
        ]);
        session()->flash('success', __('auth.register.email_sent'));
    }
    protected $encryptable = [
        'kvk_number', 
        'email',
        'password',
        'name',
        'lodging_name',
    ];

    public function store(Request $request){

    
        User::create($request->all());
        

    } 
    
}
