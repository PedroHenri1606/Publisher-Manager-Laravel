<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = "domains";

    protected $fillable = [
        'domain',
        'publisher_id',
        'status',
        'revshare'
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function revenueDomain(){
        return $this->hasMany(RevenueDomain::class);
    }
}
