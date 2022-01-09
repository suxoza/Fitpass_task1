<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\UserCard;

class EntryLog extends Model
{
    use HasFactory;


    protected $fillable = ['facility_id', 'card_id'];

    public function facility(){
        return $this->hasMany('\App\Models\Facility');
    }

    public function card(){
        return $this->hasMany('\App\Models\UserCards');
    }
}
