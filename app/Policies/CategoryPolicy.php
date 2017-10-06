<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;
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

    public function publish(User $user, Category $category)
    {
        if($category->id == config('fantasystar.notice_category_id') || $category->id == config('fantasystar.activity_category_id')){
            return $user->is_admin;
        }

        return true;
    }
}
