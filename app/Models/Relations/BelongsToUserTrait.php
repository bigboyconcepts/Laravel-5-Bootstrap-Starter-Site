<?php
namespace Starter\Models\Relations;

trait BelongsToUserTrait
{
    public function user()
    {
        return $this->belongsTo('Starter\Models\User');
    }
}