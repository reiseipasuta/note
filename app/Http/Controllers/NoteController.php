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

class NoteController extends Controller
{
    public function notetop()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        // return $posts;
        $first_post = Post::where('user_id', Auth::id())->latest('id')->first();
        return view('note.notetop')
            ->with(['posts' => $posts, 'first_post' => $first_post]);
    }

    public function shownote(Post $post)
    {
        $lists = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        // $group = Post::with('groups')->whereHas('groups', function($query) use ($post){
        //     $query->where('post_id', '=', $post->id);
        // })->first();
        $group = $post->groups()->first();

        return view('note.shownote')
            ->with(['lists' => $lists, 'post' => $post, 'group' => $group]);
    }


    public function getCreate()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $groups = Auth::user()->groups()->get();
        return view('note.create')
            ->with(['posts' => $posts, 'groups' => $groups]);
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('notetop');
    }


}
