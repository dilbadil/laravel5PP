<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * Fillable of roles.
     */
    protected $fillable = ['name'];

    /**
     * List of admin, include super admin
     *
     * @var array
     */
    public static $adminIds = [1, 2];

    /**
     * A role can have many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
