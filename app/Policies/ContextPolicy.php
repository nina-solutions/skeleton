<?php

namespace FairHub\Policies;

use FairHub\Models\Context;
use FairHub\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContextPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index(User $user,Context $manage)
    {
        return $user->isAdmin();
    }
    public function show(User $user,Context $manage)
    {
        return $user->isAdmin();
    }
    public function create(User $user,Context $manage)
    {
        return $user->isSuper();
    }
    public function edit(User $user,Context $manage)
    {
        return $user->isSuper();
    }
    public function store(User $user,Context $manage)
    {
        return $user->isSuper();
    }
    public function update(User $user,Context $manage)
    {
        return $user->isSuper();
    }
    public function destroy(User $user,Context $manage)
    {
        return false;
    }

}
