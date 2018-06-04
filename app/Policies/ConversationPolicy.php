<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Conversation $conversation
     * @return bool
     */
    public function show(User $user, Conversation $conversation){
        return $this->affect($user, $conversation);
    }

    /**
     * @param User $user
     * @param Conversation $conversation
     * @return bool
     */
    public function affect(User $user, Conversation $conversation){
        return $user->isInConversation($conversation);
    }
}
