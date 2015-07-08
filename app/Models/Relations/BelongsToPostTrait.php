<?php
namespace Starter\Models\Relations;

trait BelongsToPostTrait
{
    public function post()
    {
        return $this->belongsTo('Starter\Models\Post');
    }
}