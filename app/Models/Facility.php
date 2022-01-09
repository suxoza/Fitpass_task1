<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserCards;

class Facility extends Model
{
    use HasFactory;


    public function cards(){
        return $this->hasMany(UserCards::class);
    }
}
