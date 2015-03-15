<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use App\Models\Role;
use App\Models\Article;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

    /**
     * The basic rules of users.
     *
     * @var array
     */
    public static $rules = [

        'fullname' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'username' => 'required|alpha_dash|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['fullname', 'email', 'username', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * A user can have many articles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    /**
     * A user can have many tasks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    /**
     * A user can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    /**
     * Determine that the user is member of given method.
     *
     * @return bool
     */
    public function __call($method, $parameters)
    {
        $methodSnaked = Str::snake($method);

        if (Str::startsWith($methodSnaked, 'is_') || Str::startsWith($methodSnaked, 'is_not_'))
        {
            if (Str::startsWith($methodSnaked, 'is_not_'))
                return ! $this->detectMember($methodSnaked);

            return $this->detectMember($methodSnaked);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * Detect the user is member of user role
     *
     * @param string $methodSnaked
     * @return bool
     */
    private function detectMember($methodSnaked)
    {
        $toSnake = function($value) {
            if (is_array($value))
            {
                $value = Str::snake(str_replace(' ', '_', $value['name']));
            }

            return Str::snake(str_replace(' ', '_', $value));
        };

        $allRoles = Collection::make(Role::lists('name', 'id'))->map($toSnake);
        $userRoles = Collection::make($this->roles->toArray())->map($toSnake);

        $methodSnaked = str_replace('is_not_', '', $methodSnaked);
        $methodSnaked = str_replace('is_', '', $methodSnaked);

        $conjunctions = ['and', 'or'];

        // isAdmin, isSuperAdmin, isAuthor, etc
        if (in_array($methodSnaked, $allRoles->toArray()))
        {
            return $userRoles->contains($methodSnaked);
        }
        
        // isAdminAndAuthor, isAuthorAndSuperAdmin, etc
        if (Str::contains($methodSnaked, $conjunctions[0]))
        {
            $methodArray = explode('_and_', $methodSnaked); 
            
            foreach ($methodArray as $method)
            {
                if (! $userRoles->contains($method)) return false;
            }

            return true;
        }

        // isAdminOrAuthor, isAuthorOrAdmin, isAdminOrSuperAdmin, etc
        if (Str::contains($methodSnaked, $conjunctions[1]))
        {
            $methodArray = explode('_or_', $methodSnaked); 

            foreach ($methodArray as $method)
            {
                if ($userRoles->contains($method)) return true;
            }

            return false;
        }
    }

    /**
     * Determine that the user has the given article.
     *
     * @param Article $article
     * @return bool
     */
    public function hasArticle(Article $article)
    {
        return $article->user->id === $this->id;
    }

}
