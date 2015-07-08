<?php namespace Starter\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Starter\Models\Relations\HasManyCommentsTrait;
use Starter\Models\Relations\BelongsToUserTrait;

class Post extends Model {

    use BelongsToUserTrait;
    use HasManyCommentsTrait;
    use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description', 'content'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

    /**
     * The columns to select when displaying an index.
     *
     * @var array
     */
    public static $index = ['id', 'title', 'content', 'created_at', 'user_id'];

    /**
     * Additional columns to treat as dates.
     * Each becomes a Carbon object.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The direction to order by when displaying an index.
     *
     * @var string
     */
    public static $sort = 'desc';

    /**
     * Sets the column to order by when using sort
     */
    public static $order = 'created_at';

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'title'   => 'required',
        'description' => 'required',
        'content'    => 'required',
        'user_id' => 'required|exists:users,id',
    ];

}
