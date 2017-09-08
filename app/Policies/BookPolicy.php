<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Book;

class BookPolicy
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

    public function update(User $currentUser)
    {
        return $currentUser->is_admin;
    }

    public function destroy(User $currentUser, Book $book)
    {
        return $currentUser->is_admin;
    }
}
