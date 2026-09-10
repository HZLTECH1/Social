<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $fillable = ['content', 'image', 'user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
