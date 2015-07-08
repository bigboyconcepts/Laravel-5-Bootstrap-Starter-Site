<?php namespace Starter\Repositories\Interfaces;

/**
 * RepositoryInterface is the set of standard functions
 * all repositories are expected to provide.
 *
 * Interface RepositoryInterface
 * @package Starter\Repositories
 */
interface RepositoryInterface {

    public function create(array $attributes);

    public function all($columns = array('*'));

    public function find($id, $columns = array('*'));

    public function destroy($ids);

    public function with(array $with);

}