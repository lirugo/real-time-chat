<?php

namespace App\Http\Controllers\Api;

use App\Conversation;
use App\Http\Requests\StoreConversationReplyRequest;
use App\Transformers\ConversationTransformer;
use App\Http\Controllers\Controller;

class ConversationReplyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(StoreConversationReplyRequest $request, Conversation $conversation){
        //Auth
        $this->authorize('reply', $conversation);

        $reply = new Conversation();
            $reply->body = $request->body;
            $reply->user()->associate($request->user());
        $conversation->replies()->save($reply);
        $conversation->touchLastReply();

        return fractal()
            ->item($reply)
            ->parseIncludes(['user'])
            ->transformWith(new ConversationTransformer())
            ->toArray();
    }
}
