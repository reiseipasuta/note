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
        $lists = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        // return $posts;
        $first_post = Post::where('user_id', Auth::id())->latest('id')->first();
        return view('note.notetop')
            ->with(['lists' => $lists, 'first_post' => $first_post]);
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
        $lists = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $groups = Auth::user()->groups()->get();
        return view('note.create')
            ->with(['lists' => $lists, 'groups' => $groups]);
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('notetop');
    }

    public function getEdit(Post $post)
    {
        $post->check_user($post->user_id);
        $lists = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $groups = Auth::user()->groups()->get();
        return view('note.edit', compact('lists', 'groups', 'post'));
    }

    public function edit(Request $request, Post $post)
    {
        $post->check_user($post->user_id);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $lists = Post::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $groups = Auth::user()->groups()->get();
        return view('note.shownote', compact('lists', 'groups', 'post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('top');
        // return redirect()->back();
    }


}
