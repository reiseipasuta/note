<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    public function store($userId, $groupId, $email)
    {
        $inviteToken = \Str::random(30);

        $token = $this->newInstance();
        $token->group_id = $groupId;
        $token->user_id = $userId;
        $token->email = $email;
        $token->token = $inviteToken;
        $token->save();
        return $token;
    }
}

