@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-4 text-center">Manufacturers</h1>

            <div class="mb-5">
                <a class="btn btn-success" href="{{ route('manufacturer.create') }}">Add new manufacturer</a>
            </div>

            @if (count($data) == 0)
                <h2 class="display-5 text-center">Not Data</h2>
            @else
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}<td>
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
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
