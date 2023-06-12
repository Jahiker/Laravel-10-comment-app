<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Comment - User DB relationship
     *
     * @return void
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Comment -Replies DB relationship
     *
     * @return void
     */
    public function replies() {
        return $this->hasMany(Reply::class);
    }
}
