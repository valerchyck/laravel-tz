@extends('base')

{{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('beer.edit', $model) }}
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-4 text-center">Update a beer</h1>

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
            <form method="post" action="{{ route('beer.update', $model->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $model->name }} />
                </div>

                <div class="form-group">
                    <label for="name">Manufacturer:</label>
                    <select name="id_manufacturer" class="form-control">
                        @foreach($manufacturers as $item)
                            <option
                                    @if ($item->id == $model->id_manufacturer)
                                        selected="selected"
                                    @endif
                                    value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Beer type:</label>
                    <select name="id_type" class="form-control">
                        @foreach($types as $item)
                            <option
                                    @if ($item->id == $model->id_type)
                                        selected="selected"
                                    @endif
                                    value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Beer description:</label>
                    <textarea name="description" class="form-control">{{ $model->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
