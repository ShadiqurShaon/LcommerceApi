<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('id','=',$request->user()->id)->with('profile')->get();

        return $user;
    }

    public function store(Request $request)
    {

    }

    public function show()
    {
        
    }

    public function update(Request $request)
    {

        $user = User::find($request->user()->id);

        if($request->input('name')){

            $user->name = $request->input('name');
        }
        if($request->input('email')){

            $user->email = $request->input('email');
        }
        if($request->input('password')){

            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        $profileOfUser = Profile::find($request->user()->id);

            if($request->input('image')){

                $profileOfUser->pic = $request->input('image');
            }
            if($request->input('bio')){

                $profileOfUser->bio = $request->input('bio');
            }

        $profileOfUser->save();
            $updatedUser = User::where('id','=',$request->user()->id)->with('profile')->get();

            return $request->all();
        
    }

    public function delete()
    {
        
    }
}
