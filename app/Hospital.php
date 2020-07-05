<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /**
     * BelongsTo relation for getting a hospital owner
     */
    public function owner(){
        return $this->belongsTo(User::class);
   }
   public function doctors(){
       return $this->hasMany(Doctor::class);
   }
}
