<?php

namespace FairHub\Policies;

use FairHub\Models\Category;
use FairHub\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
    public function index(User $user,Category $manage)
    {
        return $user->isAdmin();
    }
    public function show(User $user,Category $manage)
    {
        return $user->isAdmin();
    }
    public function create(User $user,Category $manage)
    {
        return $user->isAdmin();
    }
    public function edit(User $user,Category $manage)
    {
        return $user->isAdmin();
    }
    public function store(User $user,Category $manage)
    {
        return $user->isAdmin();
    }
    public function update(User $user,Category $manage)
    {
        return $user->isAdmin();
    }
    public function destroy(User $user,Category $manage)
    {
        return false;
    }
}
