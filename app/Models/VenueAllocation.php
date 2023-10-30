<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueAllocation extends Model
{
    use HasFactory;

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'lab_admin_id');
    }
}
