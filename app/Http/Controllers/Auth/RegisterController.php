<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Career;
use App\Document;
use App\Applicant;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $careers = Career::all();
        
        return view('auth.register', compact('careers'));
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
            'dni'              => ['required', 'numeric', 'digits:8', 'unique:users'],
            'name'             => ['required', 'string', 'max:255'],
            'paternal_surname' => ['required', 'string', 'max:255'],
            'maternal_surname' => ['required', 'string', 'max:255'],
            'birth_date'       => ['required', 'date', 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('d-m-Y')],
            'gender'           => ['required', 'in:F,M'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'string', 'min:6', 'confirmed'],
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
        $user = User::create([
            'dni'              => trim($data['dni']),
            'name'             => trim(mb_strtoupper($data['name'])),
            'paternal_surname' => trim(mb_strtoupper($data['paternal_surname'])),
            'maternal_surname' => trim(mb_strtoupper($data['maternal_surname'])),
            'email'            => trim($data['email']),
            'birth_date'       => $data['birth_date'],
            'gender'           => $data['gender'],
            'password'         => Hash::make($data['password'])
        ]);
        
        Applicant::create(['user_id' => $user->id]);
        Document::create(['user_id' => $user->id]);
        
        $user->roles()->sync([2]);
        $user->careers()->sync($data['career_ids']);

        return $user;
    }
}
