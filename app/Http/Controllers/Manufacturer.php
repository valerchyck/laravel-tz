<?php

namespace App\Http\Controllers;

use App\Models\ManufacturerTypes;
use Illuminate\Http\Request;
use \App\Models\Manufacturer as ManufacturerModel;

class Manufacturer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('search');
        $data = ManufacturerModel::search($search);
        $types = \App\Models\BeerType::all();

        return view('manufacturer.index', compact('data', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = \App\Models\BeerType::all();

        return view('manufacturer.create', compact('types'));
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
            'beer_types' => 'required',
        ]);

        $manufacturer = new ManufacturerModel([
            'name' => $request->get('name'),
        ]);
        $manufacturer->save();

        foreach ($request->get('beer_types') as $idType) {
            $manufacturer->beerTypes()->saveMany([
                new ManufacturerTypes([
                    'id_manufacturer' => $manufacturer->id,
                    'id_type' => $idType,
                ]),
            ]);
        }

        return redirect('/manufacturer')->with('success', 'Manufacturer saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = ManufacturerModel::find($id);
        $types = \App\Models\BeerType::all();
        $selectedTypes = array_map(function($item) {
            return $item['id_type'];
        }, $manufacturer->beerTypes()->get('id_type')->toArray());

        return view('manufacturer.edit', compact('manufacturer', 'types', 'selectedTypes'));
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
            'name' => 'required',
            'beer_types' => 'required',
        ]);

        $manufacturer = ManufacturerModel::find($id);
        $manufacturer->name =  $request->get('name');
        $manufacturer->save();

        ManufacturerTypes::query()->where('id_manufacturer', [$manufacturer->id])->delete();
        foreach ($request->get('beer_types') as $idType) {
            $manufacturer->beerTypes()->saveMany([
                new ManufacturerTypes([
                    'id_manufacturer' => $manufacturer->id,
                    'id_type' => $idType,
                ]),
            ]);
        }

        return redirect('/manufacturer')->with('success', 'Manufacturer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = ManufacturerModel::find($id);
        $manufacturer->delete();

        return redirect('/manufacturer')->with('success', 'Manufacturer deleted!');
    }
}
