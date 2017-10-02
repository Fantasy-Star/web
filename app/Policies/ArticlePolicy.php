<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Article;

class ArticlePolicy
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

    public function update(User $user, Article $article)
    {
        return $user->is_admin || $user->id == $article->user_id;
    }

    public function edit(User $user, Article $article)
    {
        return $user->is_admin || $user->id == $article->user_id;
    }

    public function destroy(User $user, Article $article)
    {
        return $user->is_admin || $user->id == $article->user_id;
    }

}
