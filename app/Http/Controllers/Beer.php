<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beer extends Controller
{
    use CrudTrait {
        create as createBase;
        store as storeBase;
    }

    protected function getModel()
    {
        return \App\Models\Beer::class;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->createBase([
            'manufacturers' => \App\Models\Manufacturer::all(),
            'types' => \App\Models\BeerType::all(),
        ]);
    }

    public function edit($id)
    {
        $model = $this->getModel()::find($id);
        $manufacturers = \App\Models\Manufacturer::all();
        $types = \App\Models\BeerType::all();

        return view("{$this->getClassName()}.edit", compact('model', 'manufacturers', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        return $this->storeBase($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $model = $this->getModel()::find($id);
        $model->name =  $request->get('name');
        $model->id_type = $request->get('id_type');
        $model->id_manufacturer = $request->get('id_manufacturer');
        $model->save();

        return redirect('/beer')->with('success', 'Beer updated!');
    }
}
