<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public $timestamps = false;

    public function tags () {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments () {
        return $this->belongsToMany(Comment::class)->withTimestamps();
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}
