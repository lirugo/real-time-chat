<?php

namespace App\Transformers;

use App\Conversation;

class ConversationTransformer extends League\Fractal\TransformerAbstract {

    protected $availableIncludes = ['replice', 'user', 'users', 'parent'];

    /**
     * @param Conversation $conversation
     * @return array
     */
    public function transform(Conversation $conversation){
        return [
            'id' => $conversation->id,
            'parent_id' => $conversation->parent ? $conversation->parent->id : null,
            'body' => $conversation->body,
            'created_at_human' => $conversation->created_at->diffForHumans(),
            'last_reply_human' => $conversation->last_reply ? $conversation->last_reply->diffForHumans() : null,
            'participant_count' => $conversation->usersExceptCurrentlyAuthenticated->count(),
        ];
    }

    public function includesReplies(Conversation $conversation){
        return $this->collection($conversation->replies, new ConversationTransformer);
    }

    public function includesParent(Conversation $conversation){
        return $this->item($conversation->parent, new ConversationTransformer);
    }

    public function includeUser(Conversation $conversation){
        return $this->item($conversation->user, new UserTransformer);
    }

    public function includeUsers(Conversation $conversation){
        return $this->collection($conversation->users, new UserTransformer);
    }

}