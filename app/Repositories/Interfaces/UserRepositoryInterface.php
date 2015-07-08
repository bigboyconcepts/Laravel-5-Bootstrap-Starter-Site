<?php namespace Starter\Repositories\Interfaces;

/**
 * Interface for the User repository
 *
 * Interface UserRepositoryInterface
 * @package Starter\Repositories\Interfaces
 */
interface UserRepositoryInterface extends RepositoryInterface {

    public function findUserByUsername($username);

}