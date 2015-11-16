<?php

namespace FairHub\Policies;

use FairHub\Models\User;
use FairHub\Models\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(User $user,User $manage)
    {
        return $user->isAdmin();
    }
    public function show(User $user,User $manage)
    {
        return $user->isAdmin();
    }
    public function create(User $user,User $manage)
    {
        return $user->isSuper();
    }
    public function edit(User $user,User $manage)
    {
        return $user->isSuper();
    }
    public function store(User $user,User $manage)
    {
        return $user->isSuper();
    }
    public function update(User $user,User $manage)
    {
        return $user->isSuper();
    }
    public function destroy(User $user,User $manage)
    {
        return false;
    }
}
