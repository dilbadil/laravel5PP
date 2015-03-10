<?php namespace App;

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
    public static $adminIds = [1, 3];

    /**
     * A role can have many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
