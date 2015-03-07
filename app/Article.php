<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Article extends Model {

    /**
     * Fillable for article 
     *
     * @var array
     */
    protected $fillable = [

        'title',
        'body',
        'published_at',
        'slug',
    ];

    /**
     * Automatic instance Carbon when it returned
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * Manipulate published scope
     *
     * @param Article $query
     * @return void
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Manipulate unpublished scope
     *
     * @param Article $query
     * @return void
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    /**
     * Set published_at attribute
     *
     * @param date $date
     * @return void
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Get the published_at attribute.
     *
     * @param string $date
     * @return Carbon
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * An article is owned by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article.  
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a lists of tag ids associated with the current article.
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }

    /**
     * Generate slug for the article.
     *
     * @param string $slug
     * @return string
     */
    public function generateSlug($slug = "")
    {
        $slug = ($slug) ? $slug : Str::slug($this->title);

        $checkSlug = $this->whereSlug($slug)
            ->whereNotIn('id', [$this->id])
            ->first();

        if ($checkSlug)
        {
            $slug = $this->id . '-' . $slug;
        }

        return $slug;
    }

}
