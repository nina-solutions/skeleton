<?php

namespace FairHub\Policies;

use FairHub\Models\User;
use FairHub\Models\Language;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
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
    public function index(User $user,Language $manage)
    {
        return $user->isAdmin();
    }
    public function show(User $user,Language $manage)
    {
        return $user->isAdmin();
    }
    public function create(User $user,Language $manage)
    {
        return $user->isAdmin();
    }
    public function edit(User $user,Language $manage)
    {
        return $user->isAdmin();
    }
    public function store(User $user,Language $manage)
    {
        return $user->isAdmin();
    }
    public function update(User $user,Language $manage)
    {
        return $user->isAdmin();
    }
    public function destroy(User $user,Language $manage)
    {
        return false;
    }
}
