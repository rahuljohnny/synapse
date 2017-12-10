<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['adminDashboard','create','postSignIn']);
        //If the guests is not logged in,only the index and show function will work
    }

    public function postSignIn(Request $request)
    {
        $this->validate(request(),[ //It validates if title and body is set properly
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['email'=> $request['email'], 'password'=> $request['password']])){

            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function adminDashboard()
    {
        $posts = Post::ordered();
        return view('user.dashboard',compact('posts'));
    }


    public function index()
    {

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->to('/')->with(['message' => "Logged out!!"]);
    }


    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[ //It validates if title and body is set properly
            'email' => 'required|string|email|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);


        $user = new User;
        $user->email = $request['email'];
        $user->first_name = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->user_image = "null";

        $user->save();

        Auth::login($user);
        return redirect()->to('dashboard');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
