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
                        <td><input onchange="applyFilter('beer-form')" value="{{ Request::get('search')['id_manufacturer'] }}" class="form-control" type="text" name="search[id_manufacturer]"></td>
                        <td><input onchange="applyFilter('beer-form')" value="{{ Request::get('search')['id_type'] }}" class="form-control" type="text" name="search[id_type]"></td>
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
