<?php namespace Starter\Repositories;

use Starter\Repositories\Abstracts\Repository as AbstractRepository;
use Starter\Repositories\Traits\PaginateRepositoryTrait;

class CommentRepository extends AbstractRepository
{
    use PaginateRepositoryTrait;
}