<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphans extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
