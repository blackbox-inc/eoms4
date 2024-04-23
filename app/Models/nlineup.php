<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nlineup extends Model
{
    use HasFactory;
    protected $table = 'nlineup';
    protected $fillable = [
        'bcode',
        'name',
        'company_name',
        'position',
        'offer_status',
        'remarks',
        'history',
        'username',
    ];

    public $timestamps = false;
}
