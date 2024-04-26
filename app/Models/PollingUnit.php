<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    protected $table = 'polling_unit';

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id', 'ward_id');
    }

    public function lga(){
        return $this->belongsTo(Lga::class, 'lga_id', 'lga_id');
    }

}
