<?php

namespace FairHub\Models;

class Role extends HubModel
{
    public function users(){
        return $this->belongsToMany('User', 'context_users', 'user_id', 'role_id');
    }

    public function contexts(){
        return $this->belongsToMany('Context', 'context_users', 'context_id', 'role_id');
    }
}
