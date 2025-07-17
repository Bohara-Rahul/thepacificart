<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
   public function follow_user($id)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login')->with('error', 'Please login to follow the artist!');
        }
        
        // cannot follow yourself
        if (Auth::user()->id == $id) {
            return back()->with('failure', 'You cannot follow yourself');
        }
        
        $alreadyFollowed = Follow::where([['user_id', '=', Auth::user()->id], ['followeduser', '=', $id]])->count();
        
        // cannot follow someone already following
        if ($alreadyFollowed) {
            return back()->with('failure', 'You have already followed the artist');
        }
        
        $newFollow = new Follow;
        $newFollow->user_id = Auth::user()->id;
        $newFollow->followeduser = $id;
        $newFollow->save();
        
        return back()->with('success', 'Successfully followed artist');
    }

    public function unfollow_user($id)
    {
        Follow::where([['user_id', '=', Auth::user()->id], ['followeduser', '=', $id]])->delete();
        return back()->with('success', 'Artist unfollowed successfully!!!');
    }
}
