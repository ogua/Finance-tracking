<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caregivers extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
    public function orphans()
    {
        return $this->belongsToMany(Orphans::class,'caregiver_orphans','caregiver_id','orphan_id');
    }
}
