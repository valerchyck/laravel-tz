<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'name',
    ];

    public static function search($params)
    {
        $query = self::query();

        if ($params) {
            foreach ($params as $field => $param) {
                if ($param) {
                    if ($field == 'id_type') {
                        $query->orWhereHas('beerTypes', function ($query) use ($param) {
                            $query->where('id_type', '=', $param);
                        });
                    } else {
                        $query->orWhere($field, 'like', "%$param%");
                    }
                }
            }
        }

        return $query->get();
    }

    public function beerTypes()
    {
        return $this->hasMany(ManufacturerTypes::class, 'id_manufacturer', 'id');
    }
}
