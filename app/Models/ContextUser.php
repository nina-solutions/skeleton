<?php

namespace FairHub\Models;

class ContextUser extends HubModel
{
    protected $table = 'context_user';
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
        $this->belongsTo('FairHub\Models\Role');
    }

    public function user(){
        $this->belongsTo('FairHub\Models\User');
    }

    public function context(){
        $this->belongsTo('FairHub\Models\Context');
    }
}
