<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'id_manufacturer',
        'id_type',
        'name',
        'description',
    ];

    public static function search($params)
    {
        $query = self::query();

        if (isset($params['id'])) {
            $query->orWhere('id', '=', $params['id']);
        }

        if (isset($params['name'])) {
            $query->orWhere('name', 'like', "%{$params['name']}%");
        }

        if (isset($params['manufacturer'])) {
            $query->orWhereHas('manufacturer', function ($query) use ($params) {
                $query->where('name', 'like', "%{$params['manufacturer']}%");
            });
        }

        if (isset($params['type'])) {
            $query->orWhereHas('type', function ($query) use ($params) {
                $query->where('name', 'like', "%{$params['type']}%");
            });
        }

        return $query->get();
    }

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'id', 'id_manufacturer');
    }

    public function type()
    {
        return $this->hasOne(BeerType::class, 'id', 'id_type');
    }
}
