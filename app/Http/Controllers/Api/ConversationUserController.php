<?php

namespace App\Http\Controllers\Api;

use App\Conversation;
use App\Events\ConversationUsersCreated;
use App\Http\Requests\StoreConversationUserRequest;
use App\Transformers\ConversationTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConversationUserController extends Controller
{
    public function store(StoreConversationUserRequest $request, Conversation $conversation){
        //auth
        $this->authorize('affect', $conversation);

        //sync
        $conversation->users()->syncWithoutDetaching($request->recipients);

        //refresh users
        $conversation->load(['users']);

        broadcast(new ConversationUsersCreated($conversation))->toOthers();

        //return conversation
        return fractal()
            ->item($conversation)
            ->parseIncludes(['user', 'users'])
            ->transformWith(new ConversationTransformer())
            ->toArray();
    }
}
