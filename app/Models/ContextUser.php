<?php

namespace FairHub\Models;

class ContextUser extends HubModel
{
    public function scopeUser($query, $user){

        return $query->where('user_id', '=', is_integer($user) ? $user : $user->id);
    }

    public function scopeContext($query, $context){
        return $query->where('context_id', '=', is_integer($context) ? $context : $context->id);
    }

    public function scopeRole($query, $role){
        return $query->where('role_id', '=', is_integer($role) ? $role : $role->id);
    }

    public function role(){
        $this->belongsTo('Role');
    }

}
