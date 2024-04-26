<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncedPuResult extends Model
{
    use HasFactory;

    protected $table = 'announced_pu_results';

    protected $fillable = [
        'polling_unit_uniqueid', 'party_abbreviation', 'party_score', 'entered_by_user', 'date_entered', 'user_ip_address'
    ];

    public function pollingUnit(){
        return $this->belongsTo(PollingUnit::class, 'polling_unit_uniqueid', 'uniqueid');
    }
}
