@extends('base')

{{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('manufacturer.edit', $manufacturer) }}
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-4 text-center">Update a manufacturer</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('manufacturer.update', $manufacturer->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $manufacturer->name }} />
                </div>

                <label>Beer types:</label>
                @if (count($types) == 0)
                    <div>Please create some <a href="{{ route('beer-type.create') }}">types</a></div>
                @else
                    <div class="form-group">
                        @foreach($types as $type)
                            <label>
                                <input type="checkbox" name="beer_types[]"
                                       @if (in_array($type->id, $selectedTypes))
                                           checked
                                       @endif
                                       value="{{ $type->id }}">
                                {{ $type->name }}
                            </label>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Save manufacturer</button>
                @endif
            </form>
        </div>
    </div>
@endsection
