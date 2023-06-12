<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * Reply - User DB relationship
     *
     * @return void
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Reply - Comment DB relationship
     *
     * @return void
     */
    public function comment() {
        return $this->belongsTo(Comment::class);
    }
}
