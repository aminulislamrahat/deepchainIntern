<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->belongsToMany(Member::class,'yesvote', 'pendings_id', 'members_id');
    }

    public function membersNV()
    {
        return $this->belongsToMany(Member::class,'novote', 'pendings_id', 'members_id');
    }
}
