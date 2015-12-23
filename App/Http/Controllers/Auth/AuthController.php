<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        $rules = [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required',
            'agreement'  => 'required',
        ];

        if (!env('APP_DEBUG', false)) {
            $rules['g-recaptcha-response'] = 'required|recaptcha';
        }

        return Validator::make($data, $rules);
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    private function confirmationEmail($data)
    {
        \Mail::queue('emails.accountVerification', ['data' => $data, 'title' => $title, 'name' => $name], function ($message) use ($data) {
            $message->to($data['email'])->subject(trans('user.emails.verification_account.subject'));
        });
    }

    public function create(array $request)
    {
        $data = [
            'first_name'        => $request['first_name'],
            'last_name'         => $request['last_name'],
            'email'             => $request['email'],
            'password'          => bcrypt($request['password']),
            'confirmation_code' => str_random(50),
        ];

        $user = User::create($data);

        //Confirmation email
        \Mail::queue('emails.accountVerification',
        [
            'data'  => $data,
            'title' => trans('user.emails.verification_account.subject'),
            'name'  => $user->first_name.' '.$user->last_name,
        ],
        function ($message) use ($data) {
            $message->to($data['email'])->subject(trans('user.emails.verification_account.subject'));
        });

        \Session::put('message', str_replace('[name]', $name, trans('user.signUp_message')));

        \Session::save();

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * Rewrite
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister(Request $request)
    {
        return view('auth.register');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        if (!env('APP_DEBUG', false)) {
            $rules['g-recaptcha-response'] = 'required|recaptcha';
        }

        $this->validate($request, $rules);

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors(
                [
                    'email' => $this->getFailedLoginMessage(),
                ]);
    }

    public function getFacebookAuthorization()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRetrieving()
    {
        $facebook = Socialite::driver('facebook')->user();

        $url = '/auth/login';

        if ($facebook) {
            $ourUser = User::select(['id', 'first_name', 'last_name'])
                ->where('facebook_id', $facebook->user['id'])
                ->first();

            if (count($ourUser) > 0) {
                $idLogin = $ourUser->id;
            } else {
                $user = new User();
                $user->first_name = $facebook->user['first_name'];
                $user->last_name = $facebook->user['last_name'];
                $user->email = isset($facebook->user['email']) ? $facebook->user['email'] : '';
                $user->facebook_id = $facebook->user['id'];
                $user->confirmation_code = str_random(50);
                $user->save();
                $idLogin = $user->id;

                //Confirmation email
                if (trim($user->email) != '') {
                    $data = [
                        'email'             => $user->email,
                        'confirmation_code' => $user->confirmation_code,
                    ];

                    \Mail::queue('emails.accountVerification',
                    [
                        'data'  => $data,
                        'title' => trans('user.emails.verification_account.subject'),
                        'name'  => $user->first_name.' '.$user->last_name,
                    ],
                    function ($message) use ($data) {
                        $message->to($data['email'])->subject(trans('user.emails.verification_account.subject'));
                    });

                    \Session::put('message', str_replace('[name]', $user->first_name.' '.$user->last_name, trans('user.signUp_message')));
                } else {
                    \Session::put('message', str_replace('[name]', $user->first_name.' '.$user->last_name, trans('user.signUp_message2')));
                }
            }

            if (!Auth::loginUsingId($idLogin)) {
                \Session::put('message', trans('user.signin_content.error_login'));
            } else {
                $url = '/';
            }
        } else {
            \Session::put('message', trans('user.signin_content.error_facebook'));
        }

        \Session::save();

        return redirect($url);
    }
}
