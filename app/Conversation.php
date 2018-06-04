<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    protected $dates = ['last_reply'];

    public function parent(){
        return $this->belongsTo(Conversation::class, 'parent_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function usersExceptCurrentlyAuthenticated(){
        return $this->users()->where('user_id', '!=', Auth::user()->id);
    }

    public function replies(){
        return $this->hasMany(Conversation::class, 'parent_id')->orderBy('created_at', 'desc');
    }

    public function isReply(){
        return $this->parent_id !== null;
    }

    public function touchLastReply()
    {
        $this->last_reply = \Carbon\Carbon::now();
        $this->save();
    }

}
