@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4 text-center">Beers</h1>

            <div class="mb-5">
                <a class="btn btn-success" href="{{ route('beer.create') }}">Add new beer</a>
            </div>

            <form id="beer-form">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Manufacturer</td>
                        <td>Type</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input onchange="applyFilter('beer-form')" value="{{ Request::get('search')['id'] }}" class="form-control" type="text" name="search[id]"></td>
                        <td><input onchange="applyFilter('beer-form')" value="{{ Request::get('search')['name'] }}" class="form-control" type="text" name="search[name]"></td>
                        <td>
                            <select onchange="applyFilter('beer-form')" class="form-control" type="text" name="search[id_manufacturer]">
                                <option value=""></option>
                                @foreach($manufacturers as $manufacturer)
                                    <option
                                            @if ($manufacturer->id == Request::get('search')['id_manufacturer'])
                                            selected
                                            @endif
                                            value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                        <td>
                            <select onchange="applyFilter('beer-form')" class="form-control" type="text" name="search[id_type]">
                                <option value=""></option>
                                @foreach($types as $type)
                                    <option
                                            @if ($type->id == Request::get('search')['id_type'])
                                            selected
                                            @endif
                                            value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @if (count($data) == 0)
                        <tr>
                            <td colspan="4">
                                <h2 class="display-5 text-center">Not Data</h2>
                            </td>
                        </tr>
                    @else
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->manufacturer->name }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td>
                                    <a href="{{ route('beer.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('beer.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
