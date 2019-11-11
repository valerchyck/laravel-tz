<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait CrudTrait
{
    public function index()
    {
        $data = $this->getModel()::all();

        return view("{$this->getClassName()}.index", compact('data'));
    }

    public function create($params = [])
    {
        return view("{$this->getClassName()}.create", $params);
    }

    public function store(Request $request)
    {
        $beer = $this->getModel()::create($request->all());
        $beer->save();

        return redirect("/{$this->getClassName()}");
    }

    public function edit($id)
    {
        $model = $this->getModel()::find($id);
        return view("{$this->getClassName()}.edit", compact('model'));
    }

    public function destroy($id)
    {
        $manufacturer = $this->getModel()::find($id);
        $manufacturer->delete();

        return redirect("/{$this->getClassName()}");
    }

    private function getClassName() {
        $className = substr(strrchr(self::class, "\\"), 1);
        preg_match_all('/((?:^|[A-Z])[a-z]+)/', $className,$matches);
        $className = implode('-', $matches[0]);

        return strtolower($className);
    }

    abstract protected function getModel();
}
