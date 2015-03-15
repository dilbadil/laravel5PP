<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	/**
	 * Set the fillable of tasks table.
     *
     * @var array
	 */
    protected $fillable = ['item', 'completed'];

    /**
     * An task is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
