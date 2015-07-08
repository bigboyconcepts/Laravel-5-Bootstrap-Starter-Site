<?php
namespace Starter\Models\Relations;

trait HasManyCommentsTrait
{
    /**
     * Get the comment trait.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function comments()
    {
        return $this->hasMany('Starter\Models\Comment')->with(['user']);
    }

    /**
     * Before deleting the current model object,
     * delete the associated comments.
     *
     * @return void
     */
    public function beforeDelete()
    {
        $this->deleteComments();
    }

    /**
     * Delete all comments.
     *
     * @return void
     */
    public function deleteComments()
    {
        foreach ($this->comments()->get(['id']) as $comment) {
            $comment->delete();
        }
    }
}