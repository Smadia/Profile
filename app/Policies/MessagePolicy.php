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

    public function browse(User $user)
    {
        return true;
    }

    public function edit(User $user, Message $message)
    {
        return true;
    }

    public function add(User $user)
    {
        return false;
    }

    public function delete(User $user, Message $message)
    {
        return true;
    }

    public function read(User $user, Message $message)
    {
        return true;
    }
}
