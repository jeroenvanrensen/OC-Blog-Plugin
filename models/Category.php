<?php

namespace JeroenvanRensen\Blog\Models;

use Model;
use October\Rain\Database\Traits\Validation;

class Category extends Model
{
    use Validation;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = 'jeroenvanrensen_blog_categories';

    /**
     * Guarded fields.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Validation rules for this model.
     *
     * @var array
     */
    public $rules = [
        'name' => ['required', 'max:255'],
        'slug' => ['required', 'max:255', 'unique:jeroenvanrensen_blog_categories'],
        'description' => ['nullable'],
    ];
}
