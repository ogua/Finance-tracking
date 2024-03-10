<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
    public function sponsor()
    {
        return $this->belongsTo(Sponsors::class,"sponsor_id");
    }
}
