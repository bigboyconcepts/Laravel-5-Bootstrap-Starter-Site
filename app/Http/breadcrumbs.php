<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', '/');
});

// Home > {Static Page}
Breadcrumbs::register('static', function($breadcrumbs, $static)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($static['name'], route($static['link']));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Blog > [Post]
Breadcrumbs::register('post', function($breadcrumbs, $post)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($post->title, route('post', $post->id));
});