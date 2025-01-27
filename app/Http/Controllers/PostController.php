<?php

namespace App\Http\Controllers;
use APP\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authUserID=Auth::user()->id;
     
        $user=User::find($authUserID);
        $users=$user->following()->pluck('profiles.user_id');
       
        // $posts=Post::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
        $posts=Post::whereIn('user_id',$users)->latest()->paginate(1);
       return view('posts/index',compact('posts'));
        // dd($user);
    }

    public function create()
    {
        return view('posts/create');
    }


    public function store()
    {
        $data=request()->validate([
            'caption'=>'required',
            'image'=>['required','image'],
        ]);

        $imagePath=request('image')->store('uplaods','public');
        $imageFullPath="/storage/". $imagePath;

        $image=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imageFullPath
        ]);

        return redirect("/profile/".auth()->user()->id); 
    }

    public function show($post)
    {
        $post = \App\Models\Post::findOrFail($post);
        return view('posts\show',compact('post'));
        dd($post);
    }
}
