<?php

use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// manufacturer
Breadcrumbs::for('manufacturer', function ($trail) {
    $trail->push('Manufacturer', route('manufacturer.index'));
});

Breadcrumbs::for('manufacturer.create', function ($trail) {
    $trail->parent('manufacturer');
    $trail->push('Create', route('manufacturer.create'));
});

Breadcrumbs::for('manufacturer.edit', function ($trail, $manufacturer) {
    $trail->parent('manufacturer');
    $trail->push('Edit', route('manufacturer.edit', $manufacturer->id));
});

// beer
Breadcrumbs::for('beer', function ($trail) {
    $trail->push('Beer', route('beer.index'));
});

Breadcrumbs::for('beer.create', function ($trail) {
    $trail->parent('beer');
    $trail->push('Create', route('beer.create'));
});

Breadcrumbs::for('beer.edit', function ($trail, $model) {
    $trail->parent('beer');
    $trail->push('Edit', route('beer.edit', $model->id));
});

// beer type
Breadcrumbs::for('beer-type', function ($trail) {
    $trail->push('Beer Type', route('beer-type.index'));
});

Breadcrumbs::for('beer-type.create', function ($trail) {
    $trail->parent('beer-type');
    $trail->push('Create', route('beer-type.create'));
});

Breadcrumbs::for('beer-type.edit', function ($trail, $model) {
    $trail->parent('beer-type');
    $trail->push('Edit', route('beer-type.edit', $model->id));
});
