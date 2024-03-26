<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'document',
        'password',
        'role_id',
        'status',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function domains(){
        return $this->hasMany(Domain::class);
    }
}
