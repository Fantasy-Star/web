<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
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

    public function update(User $user, Topic $topic)
    {
        return $user->is_admin || $user->id == $topic->user_id;
    }

    public function edit(User $user, Topic $topic)
    {
        return $user->is_admin || $user->id == $topic->user_id;
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->is_admin || $user->id == $topic->user_id;
    }

    public function publish_notice(User $user, Topic $topic)
    {
        return $user->is_admin;
    }

    public function publish_activity(User $user, Topic $topic)
    {
        return $user->is_admin;
    }

}
