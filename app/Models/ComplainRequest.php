<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainRequest extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'lab_admin_id');
    }
    public function complain()
    {
        return $this->belongsTo(Complaint::class, 'complain_id');
    }
}
