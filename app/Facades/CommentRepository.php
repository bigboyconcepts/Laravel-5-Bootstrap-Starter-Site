<?php
namespace Starter\Facades;

use Illuminate\Support\Facades\Facade;

class CommentRepository extends Facade
{

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'CommentRepository';
    }
}