<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/**
 * @See https://github.com/diglactic/laravel-breadcrumbs
 */

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->push('Login', route('login'));
});
Breadcrumbs::for('user-account.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Register');
});
Breadcrumbs::for('verification.notice', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Notice');
});
Breadcrumbs::for('verification.verify', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Verify');
});

/** listing */
Breadcrumbs::for("listing.index", function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Listing', route('listing.index'));
});

Breadcrumbs::for("listing.show", function (BreadcrumbTrail $trail, $listing) {
    $trail->parent('listing.index');
    $trail->push('Show#' . $listing->id, route('listing.show', $listing->id));
});



/** Realtor */
Breadcrumbs::for("realtor.listing.index", function (BreadcrumbTrail $trail) {
    $trail->parent('listing.index');
    $trail->push('Realtor', route('realtor.listing.index'));
});

Breadcrumbs::for("realtor.listing.create", function (BreadcrumbTrail $trail) {
    $trail->parent('realtor.listing.index');
    $trail->push('Create', route('realtor.listing.create'));
});

Breadcrumbs::for("realtor.listing.show", function (BreadcrumbTrail $trail, $listing) {
    $trail->parent('realtor.listing.index');
    $trail->push('Show#' . $listing->id, route('realtor.listing.show', $listing->id));
});

Breadcrumbs::for("realtor.listing.edit", function (BreadcrumbTrail $trail, $listing) {
    $trail->push('Listing', route('realtor.listing.show', $listing->id));
    $trail->push('Edit', route('realtor.listing.edit', $listing->id));
});

Breadcrumbs::for("realtor.listing.image.create", function (BreadcrumbTrail $trail, $listing) {
    $trail->parent('realtor.listing.index');
    // $trail->push('Listing', route('realtor.listing.show', $listing->id));
    $trail->push('Image', route('realtor.listing.image.create', $listing->id));
});


/** Notification */
Breadcrumbs::for("notification.index", function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Notification', route('notification.index'));
});




/*
// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
*/