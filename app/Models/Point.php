<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = ['biography_id', 'user_id'];

    
    public function biography()
    {
        return $this->belongsTo(Biography::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
