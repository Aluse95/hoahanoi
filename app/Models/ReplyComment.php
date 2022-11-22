<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplyComment extends Model
{
    use HasFactory;

    protected $table = 'reply-comment';

    protected $fillable = ['comment_id', 'content','name'];

    public $timestamps = true;

    public function comment() {

        return $this->belongsTo(Comment::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }
    
}
