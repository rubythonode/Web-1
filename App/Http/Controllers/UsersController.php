<?php namespace app\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    private $form_rules = [
        'email'                 =>"required|email|unique:users,email,",
        'password'              =>'required|min:6',
        'first_name'            =>'required|min:3|max:20|string',
        'last_name'             =>'required|min:3|max:20|string'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $users = User::paginate(15);
        return view('user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $v = \Validator::make($request->all(), $this->form_rules);
        if ($v->fails()) {
            $request->flash();
            return view('user.form')->withErrors($v->errors())->withInput($request->except("password"));
        }

        $user = new User;
        $user->fill($request->all());

        $user->password=bcrypt($request->get('password'));

        $auth = \Auth::user();

        if($auth && $auth->hasRole(['Root','Administrator'])){

            $user->role = $request->get('role');
            $user->status = $request->get('status');
        }

        $user->save();

        return redirect()->route(Utility::panelRoute('users.edit'), [$user->id])->with('message', trans('user.saved')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {   
        $user = User::where('id',$id)->first();

        if (!$user || !User::cantUpdate($id)) {

            return redirect()
                    ->route(Utility::panelRoute('users.index'))
                    ->withErrors([trans('user.invalid_action')]);
        }

        return view('user.form',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user || !User::cantUpdate($id)) {

            return redirect()
                    ->route(Utility::panelRoute('users.index'))
                    ->withErrors([trans('user.invalid_action')]);
        }



        dd($id,$request);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       //
    }


    /**
     * Desactiva el perfil del usuario
     * @return string json
     */
    public function disable(Request $request)
    {
        ///
    }

    /**
     * Activa el perfil del usuario
     * @return string json
     */
    public function active(Request $request)
    {
        ///
    }


    /**
     * accountVerification allows users account verification 
     * @param  [string] $token is the var sent to users email to validate if the account belongs to him or not.
     */
    public function accountVerification($token)
    {
        //validating if the token retrieved is valid
        $user = User::select(['id'])
            ->where('confirmation_code','LIKE', $token)  
            ->first();

        if ($user)
        { 
            $name = $user->name.' '.$user->last_name;
            Session::put('message', str_replace('[name]', $name, trans('user.account_verified_ok_message')));
        }    

        else
        {
            Session::put('messageClass', 'alert alert-danger');
            Session::put('message', trans('user.account_verified_error_message'));
        }   

        Session::save();

        return redirect('/');
    }

}
