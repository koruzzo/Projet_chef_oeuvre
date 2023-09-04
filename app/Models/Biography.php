<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Biography extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','secret', 'picture', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userWithPoint()
    {
        return $this->belongsToMany(User::class, 'points')
            ->withTimestamps();
    }
    public function pointsCount()
    {
    return $this->userWithPoint()->count();
    }
}


