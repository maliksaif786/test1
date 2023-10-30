<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
