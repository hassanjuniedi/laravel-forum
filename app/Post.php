<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Post
 *
 * @property-read \App\Category $category
 * @property-read mixed $featured
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Post onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Post withoutTrashed()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'category_id',
        'featured', 'slug', 'summary',
        'type_id','download_url', 'user_id',
        'published_at'
    ];
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
//    protected $dateFormat = 'U';
    public function getFeaturedAttribute($featured) {
        return asset($featured);
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function type() {
        return $this->belongsTo('App\PostType');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
