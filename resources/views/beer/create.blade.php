@extends('base')

{{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('beer.create') }}
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-4 text-center">Add a beer</h1>

            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('beer.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="name">Manufacturer:</label>
                        @if (count($manufacturers) == 0)
                            <div>Please create some <a href="{{ route('manufacturer.create') }}">manufacturers</a></div>
                        @else
                            <select name="id_manufacturer" class="form-control">
                                @foreach($manufacturers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name">Beer type:</label>
                        <select name="id_type" class="form-control">
                            @foreach($types as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add beer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
