<?php

namespace JeroenvanRensen\Blog\Models;

use Model;
use October\Rain\Database\Traits\Validation;

class Tag extends Model
{
    use Validation;

    /**
     * The database table used by the model
     *
     * @var string.
     */
    public $table = 'jeroenvanrensen_blog_tags';

    /**
     * Guarded fields
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Validation rules for attributes
     *
     * @var array
     */
    public $rules = [
        'name' => ['required', 'max:255'],
        'slug' => ['required', 'max:255', 'unique:jeroenvanrensen_blog_tags']
    ];

    /**
     * A post belongs to many tags
     *
     * @var array
     */
    public $belongsToMany = [
        'posts' => ['JeroenvanRensen\Blog\Models\Post', 'table' => 'jeroenvanrensen_blog_post_tag']
    ];

    /**
     * Set the "slug" value when creating a tag
     *
     * @return  null
     */
    public static function boot()
    {
        static::creating(function($tag) {
            $tag->slug = str_slug($tag->name);
        });
    }
}
