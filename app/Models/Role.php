<?php

namespace FairHub\Models;

class Role extends HubModel
{
    public function users(){
        return $this->belongsToMany('FairHub\Models\User', 'context_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function contexts(){
        return $this->belongsToMany('FairHub\Models\Context', 'context_user', 'context_id', 'role_id')->withTimestamps();
    }
}
