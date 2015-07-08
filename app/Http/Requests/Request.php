<?php namespace Starter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {

    /**
     * Return array of specified values from
     * model validation
     * @param $rules
     * @param $fillable
     */
	public function formRules($rules, $fillable)
    {
        foreach($rules as $rule => $definition){
            if(!array_key_exists($rule, $fillable))
            {
                unset($rules[$rule]);
            }
        }
        return $rules;
    }

}
