<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // Hapus 'author', ganti dengan 'user_id'
    protected $fillable = ['user_id', 'title', 'content', 'cover_image'];

    // Relasi: Cerita ini milik 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
