<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'admin_id',
    ];

    public function findById($id)
    {
        return $this->newQuery()->find($id);
    }

    public function admin_user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function check_member($group)
    {
        $member = $group->users->contains(function ($user) {
            return $user->id === Auth::id();
        });

        if (!$member)
        {
            return abort(403);
        }
    }
}
