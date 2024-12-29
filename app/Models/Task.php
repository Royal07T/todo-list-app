<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'completed', 'user_id'];

    /**
     * Define the inverse relationship: each task belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // A task belongs to one user
    }
}
