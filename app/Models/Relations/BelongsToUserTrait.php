<?php
namespace Starter\Models\Relations;

trait BelongsToUserTrait
{
    public function user()
    {
//        return 'test';
        return $this->belongsTo('Starter\Models\User');
    }
}