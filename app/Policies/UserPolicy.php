<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function is_admin(User $currentUser){
        return $currentUser->is_admin;
    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id || $currentUser->is_admin;
    }

    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id || $currentUser->is_admin;
    }

}
