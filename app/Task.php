<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	/**
	 * Set the fillable of tasks table.
     *
     * @var array
	 */
    protected $fillable = ['item', 'completed'];

}
