<?php

namespace FairHub\Models;

class UserContextRole extends HubModel
{
    public function scopeUser($query, $user){
        return $query->where('user_id', '=', $user->id);
    }
}
