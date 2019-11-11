<?php

namespace App\Http\Controllers;

class BeerType extends Controller
{
    use CrudTrait {
        create as createBase;
        store as storeBase;
    }

    public function create()
    {
        return $this->createBase();
    }

    protected function getModel()
    {
        return \App\Models\BeerType::class;
    }
}
