<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heaithrecords extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
    public function orphan()
    {
        return $this->belongsTo(Orphans::class,"orphan_id");
    }
}
