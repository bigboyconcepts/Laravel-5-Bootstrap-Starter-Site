<?php
namespace Starter\Http\Requests;

use Starter\Models\Comment;

class CommentFormRequest extends Request
{
    /**
     * @return mixed
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the rules for the validation of the form.
     * Only get the fillable values.
     *
     * @return array
     */
    public function rules()
    {
        return $this->formRules(Comment::$rules,[
            'name' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);
    }
}