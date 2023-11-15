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

class GroupController extends Controller
{
    public function getCreateGroup()
    {
        return view('group.create-g');
    }

    public function createGroup(Request $request)
    {
        $group = Group::create([
            'group_name' => $request->group_name,
            'admin_id' => Auth::id(),
        ]);
        // $group->group_name = $request->group_name;
        // $group->admin_id = Auth::id();
        // $group->save();

        User::find(Auth::id())->groups()->attach($group);

        return redirect()->route('showGroup', $group);
    }

    public function showGroup(Group $group)
    {
        $group->check_member($group);

        $groupId = $group->id;

        $lists = Post::with('groups')->whereHas('groups', function($query) use ($groupId){
            $query->where('group_id', '=', $groupId);
        })
        ->latest()->get();

        // $posts = Post::with('user.groups')
        // ->whereHas('user.groups', function($query) use ($groupId) {
        //     $query->where('group_id', '=', $groupId);
        // })->orderBy('id', 'desc')
        // ->get();

        // $group_user = Group::with('users')->find($group->id);

        $group->load('users');
        // return $group;
        // dd($group);

        // $member = Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists();
        $member = $group->users->contains(function ($user) {
            return $user->id === Auth::id();
        });

        return view('group.show-group', compact('lists', 'group', 'member'));
    }

    public function showGroupFrom(Group $group)
    {
        $group->check_member($group);
        $groupId = $group->id;

        $lists = Post::with('groups')->whereHas('groups', function($query) use ($groupId){
            $query->where('group_id', '=', $groupId);
        })
        ->latest()->get();

        // $posts = Post::with('user.groups')
        // ->whereHas('user.groups', function($query) use ($groupId) {
        //     $query->where('group_id', '=', $groupId);
        // })->orderBy('id', 'desc')
        // ->get();

        $member = Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists();

        return view('group.create-note-g', compact('lists', 'group', 'member'));
    }

    public function createGroupNote(Request $request,Group $group)
    {
        $group->check_member($group);
        $post = new Post();
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->save();
        $post->groups()->attach($group->id);

        return back();
    }


    public function showGroupNote(Group $group, Post $post)
    {
        $groupId = $group->id;

        // これでも下でも動く
        // $lists = Post::with('user.groups')
        // ->whereHas('user.groups', function($query) use ($groupId) {
        //     $query->where('group_id', '=', $groupId);
        // })->orderBy('id', 'desc')
        // ->get();

        // $groups = Group::with('users')->find($groupId);
        // $userIds = $group->users->pluck('id');
        // $lists = Post::whereIn('user_id', $userIds)->orderBy('id', 'desc')->get();

        $lists = Post::whereHas('groups', function($query) use ($groupId){
            $query->where('group_id', '=', $groupId);
        })
        ->latest()->get();

        $member = Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists();

        return view('group.shownote-g', compact('lists', 'group', 'post', 'member'));
    }

    public function getEditGroupNote(Group $group, Post $post)
    {
        $group->check_member($group);
        $groupId = $group->id;

        $lists = Post::whereHas('groups', function($query) use ($groupId){
            $query->where('group_id', '=', $groupId);
        })
        ->latest()->get();

        $member = Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists();

        return view('group.edit-note-g', compact('lists', 'group', 'post', 'member'));
    }

    public function editGroupNote(Request $request,Group $group,Post $post)
    {
        $group->check_member($group);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $lists = Post::with('groups')->whereHas('groups', function($query) use ($group){
            $query->where('group_id', '=', $group->id);
        })
        ->latest()->get();

        $member = Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists();

        return view('group.shownote-g', compact('lists', 'group', 'post', 'member'));
    }

    public function destroyGroupNote(Group $group,Post $post)
    {
        $post->delete();

        return redirect()->route('showGroup', $group);
    }

    public function inviteGroup(Request $request, Group $group,Token $token)
    {
        // $inviteToken = Str::random(30);

        // $token = new Token();
        // $token->group_id = $group->id;
        // $token->user_id = Auth::id();
        // $token->email = $request->email;
        // $token->token = $inviteToken;
        // $token->save();

        $token = (new Token())->store(Auth::id(), $group->id, $request->email);

        Mail::to($request->email)->send(new InviteGroup($token));
        session()->flash('send', '送信しました');
        return back();
    }


    public function joinGroup(Group $group, string $token)
    {
        if (Token::where('group_id', $group->id)->where('token', $token)->exists())
        {
            if (Auth::user()->groups()->where('user_id', Auth::id())->where('group_id', $group->id)->exists()){
                return "既に参加しています";
            }else{
                Auth::user()->groups()->attach($group->id);
                Token::where('token', $token)
                    ->update(['flag' => 1]);
                // $token_data->flag = 1;
                // $token_data->save();
                session()->flash('send', '参加が完了しました！');
                return redirect()->route('showGroup', $group);
            }
        }else{
            return "無効な招待です";
        }

    }

    public function  quitGroup(Group $group)
    {
        Auth::user()->groups()->detach($group->id);

        return redirect('notetop');
    }

}
