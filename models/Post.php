<?php

namespace JeroenvanRensen\Blog\Models;

use Backend\Models\User;
use Model;
use October\Rain\Database\Traits\Validation;
use BackendAuth;

class Post extends Model
{
    use Validation;

    /**
     * The database table used by this model
     *
     * @var  string
     */
    public $table = 'jeroenvanrensen_blog_posts';

    /**
     * Validation rules for this model
     *
     * @var array
     */
    public $rules = [
        'user_id' => ['required', 'exists:backend_users,id'],
        'category_id' => ['required', 'exists:jeroenvanrensen_blog_categories,id'],
        'title' => ['required', 'max:255'],
        'slug' => ['required', 'max:255', 'unique:jeroenvanrensen_blog_posts'],
        'body' => ['required'],
        'excerpt' => ['required'],
        'published_at' => ['nullable', 'date']
    ];

    /**
     * Guarded fields
     *
     * @var  array
     */
    protected $guarded = [];

    /**
     * Apply the category and the user each time a post is fetched
     *
     * @var array
     */
    protected $with = [
        'category', 'user'
    ];

    /**
     * Attach images to a post
     *
     * @var array
     */
    public $attachOne = [
        'featured_image' => 'System\Models\File'
    ];

    /**
     * A post belongs to a user and a category
     *
     * @var array
     */
    public $belongsTo = [
        'user' => 'Backend\Models\User',
        'category' => 'JeroenvanRensen\Blog\Models\Category'
    ];

    /**
     * A post belongs to many tags
     *
     * @var array
     */
    public $belongsToMany = [
        'tags' => ['JeroenvanRensen\Blog\Models\Tag', 'table' => 'jeroenvanrensen_blog_post_tag']
    ];

    /**
     * Returns an array with all backend users.
     *
     * @return  array
     */
public function getUserIdOptions()
  {
  // placeholder
  $result = [];

  // only back-end user which is currently logged in
  // it will be available always as we are in back-end :)
  $user = BackendAuth::getUser();
  $result[$user->id] = $user->login; // or $user->email;    

  return $result;
  }

    /**
     * Returns an array with all categories
     *
     * @return  array
     */
    public function getCategoryIdOptions()
    {
        $categories = Category::all()->toArray();

        foreach ($categories as $category) {
            $categoryArray[$category['id']] = $category['name'];
        }

        return $categoryArray;
    }
}
