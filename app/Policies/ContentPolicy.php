<?php

namespace FairHub\Policies;
use FairHub\Models\User;
use FairHub\Models\Content;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Session;

class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //dd(User::where('id', '>=',$request->user()->id)->first()->contexts()->get()->pluck('pivot.role_id', 'pivot.context_id'));
        //dd($request->user()->contexts()->get()->pluck('id')->toArray());
    }

    public function index(User $user, Content $content)
    {
        if(!isset($content->context_id)) {
            return true;
        }
        $policy = session('acl');
        return isset($policy[$content->context_id]);
    }
    public function update(User $user, Content $content)
    {
        $policy = session('acl');
        if(isset($policy[$content->context_id])){
            if($content->status_id == 4 || $content->status_id == 3){
                return $policy[$content->context_id] < 3;
            }
            //if is not published content, that's fine
            return true;
        }
        return false;
    }
    public function create(User $user, Content $content)
    {
        return true;
    }
    public function store(User $user, Content $content)
    {
        $policy = session('acl');
        if(isset($policy[$content->context_id])){
            if($content->status_id == 4 || $content->status_id == 3){
                return $policy[$content->context_id] < 3;
            }
            //if is not published content, that's fine
            return true;
        }
        return false;
    }
    public function edit(User $user, Content $content)
    {
        $policy = session('acl');
        if(isset($policy[$content->context_id])){
            if($content->status_id == 4 || $content->status_id == 3){
                return $policy[$content->context_id] < 3;
            }
            //if is not published content, that's fine
            return true;
        }
        return false;
    }
    public function show(User $user, Content $content)
    {
        $policy = session('acl');
        return isset($policy[$content->context_id]);
    }
    public function destroy(User $user, Content $content)
    {
        return false;
    }
}
