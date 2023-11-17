<?php

namespace App\Http\Controllers;

use App\Mail\InviteGroup;
use App\Mail\SharePost;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Group;
use App\Models\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function getTop()
    {
        // $groups = User::find(Auth::id())->groups()->get();
        // return $groups;
        $lists = Post::where('user_id', Auth::id())->latest()->get();
        return view('top')
            ->with(['lists' => $lists]);
    }

    public function guest()
    {
        Auth::loginUsingId(1);
        return redirect()->route('notetop');
    }

    public function shareForm(Post $post)
    {
        $lists = Post::where('user_id', Auth::id())->latest()->get();
        return view('note.shareForm', compact('post', 'lists'));
    }

    public function shareForm_g(Group $group, Post $post)
    {
        $member = Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists();

        $groupId = $group->id;
        $lists = Post::whereHas('groups', function($query) use ($groupId){
            $query->where('group_id', '=', $groupId);
        })
        ->latest()->get();

        return view('group.shareForm-g', compact('post', 'lists', 'member', 'group'));
    }

    public function share(Request $request, Post $post, User $user)
    {
        Mail::to($request->email)->send(new SharePost($post, $user));
        session()->flash('send', '送信しました');
        return back();
    }

    public function showShare(Post $post)
    {
        return view('note.showShare', compact('post'));
    }



}
