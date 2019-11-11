<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'id_manufacturer',
        'id_type',
        'name',
    ];

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'id', 'id_manufacturer');
    }

    public function type()
    {
        return $this->hasOne(BeerType::class, 'id', 'id_type');
    }
}
