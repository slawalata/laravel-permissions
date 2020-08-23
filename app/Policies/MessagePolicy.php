<?php

namespace App\Policies;

use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
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

    /**
     * Determine whether the user can view any posts.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param \App\User|null $user
     * @param \App\Post $message
     * @return mixed
     */
    public function view(?User $user, Message $message)
    {
        if ($user === null) {
            return false;
        }
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('write-message')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param \App\User $user
     * @param \App\Post $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
//        die('I AM HERE');
        return true;
//        if ($user->can('edit-own-message')) {
//            return $user->id == $message->user_id;
//        }
//
//        if ($user->can('edit-message')) {
//            return true;
//        }
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param \App\User $user
     * @param \App\Post $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        // not yet implemented
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param \App\User $user
     * @param \App\Post $post
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param \App\User $user
     * @param \App\Post $post
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
        //
    }

}
