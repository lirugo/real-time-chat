<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function parent(){
        return $this->belongsTo(Conversation::class, 'parent_id');
    }
}
