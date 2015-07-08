<?php
namespace Starter\Http\Requests;

use Starter\Models\Post;

class BlogFormRequest extends Request
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
        return $this->formRules(Post::$rules,[
            'title',
            'description',
            'content'
        ]);
    }
}