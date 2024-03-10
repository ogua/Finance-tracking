<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
    
    public function donation()
    {
        return $this->hasOne(Sponsors::class,"sponsor_id");
    }
    
    public function orphans()
    {
        return $this->belongsToMany(Orphans::class,'orphan_sponsors','orphan_id','sponsor_id');
    }
}
