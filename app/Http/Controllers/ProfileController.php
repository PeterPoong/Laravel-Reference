<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($user)
    {
        $user=User::findOrFail($user);
        $user->profile()->firstOrFail();
        //if auth user's following contain this particular user's id  mean is follow 
        if(auth()->user()->following->contains($user->id))
        {
            $followStatus=true;
        }else
        {
            $followStatus=false;
        }
        

        // dd($followStatus);
        return view('profiles/index',compact('user','followStatus'));
    }


    //normal return json format 
    public function test()
    {
        $userName=User::find(1);
        return $this->convertToJson($userName->profile);
        // return view('home',['users'=>'1']);
    }

    public function edit($userID)
    {
        $user=User::findOrFail($userID);
        $this->authorize('update',$user->profile);
        return view('profiles/edit',compact('user'));
    }

    public function update($user)
    {
        $userProfile=User::findOrFail($user);
        $this->authorize('update',$userProfile->profile);
        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'URL'=>'url',
            'image'=>'',
        ]);

        if(request('image'))
        {
            $imagePath=request('image')->store('profile','public');
            // $imageFullPath="/profile/". $imagePath;
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray=['image'=>$imagePath];
        }
       
        $userProfile->profile->update(array_merge($data,$imageArray??[]));
        return redirect("/profile/$user");
        // return redirect("/profile/{{$user}}");

       
    }
}
