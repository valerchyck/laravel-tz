<?php

namespace App\Http\Controllers;

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
        $data = ManufacturerModel::all();

        return view('manufacturer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturer.create');
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
            'name'=>'required',
        ]);

        $manufacturer = new ManufacturerModel([
            'name' => $request->get('name'),
        ]);
        $manufacturer->save();

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
        return view('manufacturer.edit', compact('manufacturer'));
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

        $manufacturer = ManufacturerModel::find($id);
        $manufacturer->name =  $request->get('name');
        $manufacturer->save();

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
