<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueDomain extends Model
{
    use HasFactory;

    protected $table = "revenue_domain";

    protected $fillable = [
        'domain_id',
        'impressions',
        'cpm',
        'cpc',
        'rpm',
        'ctr',
        'clicks',
        'revenue', 
    ];

    public function domain(){
        return $this->belongsTo(Domain::class);
    }
}
