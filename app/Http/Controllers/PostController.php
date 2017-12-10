<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
        //If the guests is not logged in,only the index and show function will work
    }

    public function index()
    {
        //
    }

    public function deletePost($id)
    {
        $companyToDelete = Post::find($id);
        if($companyToDelete->user->id == Auth::id()){

            if($companyToDelete->delete()){
                return redirect()->to('dashboard')->with(['message' => "Deleted post!!"]);
            }
            return back()->withInput()->with('Error','Project could not be deleted!!');
        }
        return redirect()->to('dashboard')->with(['error' => "You don't have this permission!"]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$posts = Post::ordered();
        return redirect()->to('dashboard')->with(['message' => "Post published!"]);

        //return view('user.dashboard',compact('posts'))->with(['message' => "Post published!!"]);
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
            'body' => 'required|string|min:3|max:1000'
        ]);
        $post = new Post;
        $post->body = $request->body;

        if($request->user()->post()->save($post))
        {
            $notifier = 'You pubished a post';
            return redirect()->to('dashboard')->with(['message' => $notifier]);
        }
        return redirect()->to('dashboard')->with(['message' => "Something wrong,try again later!!"]);

    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companyToDelete = Post::find($id);

        if($companyToDelete->delete())
        {
            return redirect()->to('dashboard')->with(['message' => "Deleted post!!"]);
        }
        return back()->withInput()->with('Error','Project could not be deleted!!');


    }
}
