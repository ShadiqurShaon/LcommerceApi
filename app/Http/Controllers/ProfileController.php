<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('profile')->get();

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
        $profileOfUser = Profile::find($request->user()->id);

        $profileOfUser->pic = $request->input('pic');
        $profileOfUser->bio = $request->input('bio');

        $profileOfUser->save();

        return 'your Profile update successfully';
        
    }

    public function delete()
    {
        
    }
}
