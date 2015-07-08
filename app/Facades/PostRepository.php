<?php
namespace Starter\Facades;

use Illuminate\Support\Facades\Facade;

class PostRepository extends Facade
{

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'PostRepository';
    }
}