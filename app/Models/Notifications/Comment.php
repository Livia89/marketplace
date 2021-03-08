<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ["user_id", "title", "body", 'post_id'];

    public function post()
    {
        $this->belongsTo(Posts::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
