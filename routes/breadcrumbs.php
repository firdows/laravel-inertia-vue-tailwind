<?php
/*
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

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


Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});
Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login');
});

/** listing */
Breadcrumbs::for("listing.index", function ($trail) {
    $trail->parent('home');
    $trail->push('Listing', route('listing.index'));
});

Breadcrumbs::for("listing.show", function ($trail, $listing) {
    $trail->parent('listing.index');
    $trail->push('Show', route('listing.show', $listing->id));
});



/** Realtor */
Breadcrumbs::for("realtor.listing.index", function ($trail) {
    $trail->parent('home');
    $trail->push('Realtor', route('realtor.listing.index'));
});

Breadcrumbs::for("realtor.listing.create", function ($trail) {
    $trail->parent('realtor.listing.index');
    $trail->push('Create', route('realtor.listing.create'));
});

Breadcrumbs::for("realtor.listing.show", function ($trail, $listing) {
    $trail->parent('realtor.listing.index');
    $trail->push('Show', route('realtor.listing.show', $listing->id));
});

Breadcrumbs::for("realtor.listing.edit", function ($trail, $listing) {
    $trail->push('Listing', route('realtor.listing.show', $listing->id));
    $trail->push('Edit', route('realtor.listing.edit', $listing->id));
});

Breadcrumbs::for("realtor.listing.image.create", function ($trail, $listing) {
    $trail->parent('realtor.listing.index');
    $trail->push('Listing', route('realtor.listing.show', $listing->id));
    $trail->push('Image', route('realtor.listing.image.create', $listing->id));
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