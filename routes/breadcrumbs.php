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

Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('produkter');
    $trail->push('Skapa ny produkt', route('products.create'));
});

Breadcrumbs::for('kategorier', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kategorier', route('categories.index'));
});

Breadcrumbs::for('categories.show', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('kategorier');
    $trail->push($category->name, route('categories.show', $category->id));
});

Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('kategorier');
    $trail->push('Skapa ny kategori', route('categories.create'));
});