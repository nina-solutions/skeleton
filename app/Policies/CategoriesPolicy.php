<?php

namespace FairHub\Policies;

use FairHub\Models\Category;
use FairHub\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriesPolicy
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
        return $user->isSuper();
    }
    public function edit(User $user,Category $manage)
    {
        return $user->isSuper();
    }
    public function store(User $user,Category $manage)
    {
        return $user->isSuper();
    }
    public function update(User $user,Category $manage)
    {
        return $user->isSuper();
    }
    public function destroy(User $user,Category $manage)
    {
        return false;
    }
}
