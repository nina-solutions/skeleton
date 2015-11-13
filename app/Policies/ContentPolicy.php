<?php

namespace FairHub\Policies;
use FairHub\Models\User;
use FairHub\Models\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

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
        return in_array($content->context_id, $user->contexts()->get()->pluck('id')->toArray());
    }
    public function update(User $user, Content $content)
    {
        return in_array($content->context_id, $user->contexts()->get()->pluck('id')->toArray());
    }
    public function create(User $user, Content $content)
    {
        return in_array($content->context_id, $user->contexts()->get()->pluck('id')->toArray());
    }
    public function store(User $user, Content $content)
    {
        return in_array($content->context_id, $user->contexts()->get()->pluck('id')->toArray());
    }
    public function edit(User $user, Content $content)
    {

        return in_array($content->context_id, $user->contexts()->get()->pluck('id')->toArray());
    }
    public function destroy(User $user, Content $content)
    {
        return false;
    }
}
