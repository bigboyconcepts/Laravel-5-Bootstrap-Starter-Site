<?php
namespace Starter\Models\Relations;

trait HasManyPostsTrait
{
    /**
     * Get the post relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function posts()
    {
        return $this->hasMany('Starter\Models\Post');
    }

    /**
     * Delete all posts.
     *
     * @return void
     */
    public function deletePosts()
    {
        foreach ($this->posts()->get(['id']) as $post) {
            $post->delete();
        }
    }
}