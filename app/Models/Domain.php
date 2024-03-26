<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'publisher_id',
        'status',
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
