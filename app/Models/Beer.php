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

        if ($params) {
            foreach ($params as $field => $param) {
                if ($param) {
                    if ($field == 'id_type') {
                        $query->whereHas('type', function ($query) use ($param) {
                            $query->where('id_type', '=', $param);
                        });
                    } else if ($field == 'manufacturer') {
                        $query->orWhereHas('beerTypes', function ($query) use ($param) {
                            $query->where('id_manufacturer', '=', $param);
                        });
                    }
                    else {
                        $query->where($field, 'like', "%$param%");
                    }
                }
            }
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
