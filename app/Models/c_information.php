<?php

namespace App\Models;

use App\Models\nlineup;
use App\Models\ndeploy;
use App\Models\c_category;
use App\Models\c_contactinfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_information extends Model
{
    use HasFactory;
    protected $table = 'c_information';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(c_category::class, 'bcode', 'u_num');
    }

    public function contact()
    {
        return $this->belongsTo(c_contactinfo::class, 'bcode', 'u_num');
    }

    public function nlineup()
    {
        return $this->belongsTo(nlineup::class, 'bcode', 'bcode');
    }

    public function ndeploy()
    {
        return $this->belongsTo(ndeploy::class, 'bcode', 'Barcode');
    }
}
