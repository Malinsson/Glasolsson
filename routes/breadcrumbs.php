<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('produkter', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Produkter', route('products.index'));
});

Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('produkter');
    $trail->push($product->name, route('products.show', $product->id));
});

Breadcrumbs::for('kategorier', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kategorier', route('categories.index'));
});

Breadcrumbs::for('categories.show', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('kategorier');
    $trail->push($category->name, route('categories.show', $category->id));
});