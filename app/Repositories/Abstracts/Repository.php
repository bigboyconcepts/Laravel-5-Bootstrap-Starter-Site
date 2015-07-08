<?php namespace Starter\Repositories\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;
use Starter\Repositories\Interfaces\RepositoryInterface;

/**
 * The Abstract Repository provides default implementations of the methods defined
 * in the base repository interface. These simply delegate static function calls
 * to the right eloquent model based on the $modelClassName.
 *
 * Originally from https://gist.github.com/coreymcmahon/8878753#file-repository-php
 *
 * Class Repository
 * @package Starter\Repositories\Abstracts
 */
abstract class Repository implements RepositoryInterface {

    /**
     * The Eloquent Model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The validator factory instance.
     *
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * The models for with.
     *
     */
    protected $with = array();

    /**
     * @param Model $model
     * @param Factory $validator
     */
    public function __construct(Model $model, Factory $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return call_user_func_array([$this->getModel(), 'create'], array($attributes));
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return call_user_func_array([$this->getModelWith(), 'all'], array($columns));
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return call_user_func_array([$this->getModelWith(), 'find'], array($id, $columns));
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return call_user_func_array([$this->getModel(), 'count'], array());
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function destroy($ids)
    {
        return call_user_func_array([$this->getModel(), 'destroy'], array($ids));
    }

    /**
     * @param $observer
     * @return mixed
     */
    public function observe($observer)
    {
        return call_user_func_array([$this->getModel(), 'observe'], array($observer));
    }

    /**
     * Allow with for proper joins.
     * Merge with any existing on model.
     *
     * @param array $with
     * @return self
     */
    public function with(array $with)
    {
        $this->with = array_merge($this->with, $with);

        return $this;
    }

    /**
     * @param null $query
     * @return array
     */
    public function rules($query = null)
    {
        $model = $this->getModel();
        // get rules from the model if set
        if (isset($model::$rules)) {
            $rules = $model::$rules;
        } else {
            $rules = [];
        }
        if(empty($rules) || !is_array($rules))
        {
            return [];
        }
        // if the query is empty
        if (!$query) {
            // return all of the rules
            // array filter clears empty, null, false values
            return array_filter($rules);
        }
        // return the relevant rules
        return array_filter(array_only($rules, $query));
    }

    /**
     * @param array $data
     * @param null $rules
     * @param bool $custom
     * @return \Illuminate\Validation\Validator
     */
    public function validate(array $data, $rules = null, $custom = false)
    {
        if (!$custom) {
            $rules = $this->rules($rules);
        }
        return $this->validator->make($data, $rules);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModelWith()
    {
        return $this->model->with($this->with);
    }

    /**
     * @return \Illuminate\Validation\Factory
     */
    public function getValidator()
    {
        return $this->validator;
    }
}