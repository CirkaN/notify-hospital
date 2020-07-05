<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Doctor extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'email', 'password','surname','hospital_id','token','created_by',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 
     * BelongsTo relation for getting where doctor is working
     * 
     */
    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
    public function getFullNameAttribute()
{
    return "{$this->name} {$this->surname}";
}
}
