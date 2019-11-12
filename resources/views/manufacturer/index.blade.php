@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4 text-center">Manufacturers</h1>

            <div class="mb-5">
                <a class="btn btn-success" href="{{ route('manufacturer.create') }}">Add new manufacturer</a>
            </div>


            <form id="manufacturer-form">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Types</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input onchange="applyFilter('manufacturer-form')" value="{{ Request::get('search')['id'] }}" class="form-control" type="text" name="search[id]"></td>
                        <td><input onchange="applyFilter('manufacturer-form')" value="{{ Request::get('search')['name'] }}" class="form-control" type="text" name="search[name]"></td>
                        <td>
                            <select onchange="applyFilter('manufacturer-form')" class="form-control" type="text" name="search[id_type]">
                                <option value=""></option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @if (count($data) == 0)
                        <h2 class="display-5 text-center">Not Data</h2>
                    @else
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @foreach($item->beerTypes as $type)
                                        <div>{{ $type->type->name }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('manufacturer.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('manufacturer.destroy', $item->id)}}" method="post">
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
