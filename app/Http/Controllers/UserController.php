<?php
/*
	@File Name   	: UserController.php 
	@Class Name  	: UserController
	@Created date	: 17/10/2021
	@Created By		: Pavan Kumar M
	@Contains user register, login, logout and accounts listing functionalities.
*/
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\User;
use App\Accounts;
use Hash;

class UserController extends Controller
{
	/*
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@Renders resources/views/login.blade.php
	*/
    public function index() 
	{
		return view('login');
	}
	
	/*
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@Renders resources/views/register.blade.php
	*/
	public function create()
    {
        return view('register');
    }
	
	/*
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@Returns response 
        @Stores user data into  users table
	*/
	public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'email'=>'required|string|email|max:100|unique:users',
            'password'=>'required|string|min:8|max:100|confirmed',
            'password_confirmation'=>'required',
        ]);
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            if($user) {
                return back()->with('success','Registered successfully!');
            } else {
                return back()->with('error','Registration failed..Please try again!');
            }
            
    }
	
	/*
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@validate the data from login form
	*/
	public function login(Request $request)
	{			
		$request->validate([
			'email'=>'required|string|email',
            'password'=>'required|string',		
		]);	
		$credentials = $request->only('email','password');
        $remember_me = (!empty($request->remember_me)) ? TRUE : FALSE;
		if(Auth::attempt($credentials)) {
			$user = User::where(['email'=>$credentials['email']])->first();   
			Auth::login($user,$remember_me);
			$user = $user->get()->toArray();
 
			return redirect('dashboard')->with('success','Login successfully!');
		}
		return back()->with('warning','Login failed !');
	}
	
	/*
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@logs out the user 
	*/
	public function logout()
    {
        if(Auth::user()) {
            Auth::logout();
            return redirect('/')->with('success','You are logged out !');
        }
    }
	
	/*
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@Renders resources/views/accounts.blade.php along with accounts table data
	*/
	public function dashboard()
    {
        if(Auth::user()) {
			$accounts = Accounts::paginate(5);
			return view('accounts',compact('accounts'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return redirect('/')->with('info','Please Login!');
        }
    }
	
	/**
		@Created date	: 17/10/2021
		@Created By		: Pavan Kumar M	
		@Remove the data from storage.
		@soft delete
     */
    public function destroy($id)
    {
        $user = Accounts::find( $id );
        $user->delete(); 
        return back()->with('success', 'Data is successfully deleted');
    }
	
}
