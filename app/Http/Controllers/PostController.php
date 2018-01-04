<?php

namespace App\Http\Controllers;


use App\Like;
use App\Post;
use Carbon\Carbon;
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

    public function likeDislikePost(Request $request)
    {
        //return $request;
        $post_id = $request['postID'];

        if(!$request['isLike']){
            $isLike = 0;
        }
        else if($request['isLike']){
            $isLike = 1;
        }
        //return $isLike;

        $user = Auth::user();

        //If this post already has got a like/dislike by this user
        $like = $user->likes()->where('post_id',$post_id)->first();


        //return $like;

        if($like){//if this post_id is already in like table
            $storedLikeVal = $like->like;
            //return $storedLikeVal;
            if($isLike == $storedLikeVal){ //If it's a like/un in DB and again the like/un button is pressed
                $like->delete();
                return $like;
                //return "Deleted";
            }
            else{
                $likeToUpdate = $user->likes()->where('post_id','=',$post_id)
                                ->update(
                                    ["like" => $isLike]
                                );
                $updatedLike = $user->likes()->where('post_id','=',$post_id)->first();

                return $updatedLike;
                //return "Updated liked / Unliked!";

            }
        }
        else{
            $like = new Like;
            $like->like = $isLike;
            $like->user_id = $user->id;
            $like->post_id = $post_id;
            $like->save();
            return $like;

            //return "completely newly liked/Unliked";
        }

        //echo $storedLikeVal;

        //return $like;
    }

    public function onlyToPassTwoVariable(Request $request)
    {
        $likedStatus1 = $request['likedStatus'];
        $unlikedStatus1 = $request['unlikedStatus'];
        view('user.dashboard',compact('likedStatus1', 'unlikedStatus1'));
        return $request;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $postUpdated = Post::find($request['id']);
        $postUpdated->body = $request['body']; //Only these fields will be changed
        $postUpdated->updated_at = Carbon::now();
        $postUpdated->save();
        //return response()->json(['body'=>$postUpdated->body], 200);
        return $request;
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
