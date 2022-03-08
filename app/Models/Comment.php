<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id'];

    public function book () {
        return $this->belongsTo(Book::class)->withTimestamps();
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
