<?php

namespace JeroenvanRensen\Blog\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use JeroenvanRensen\Blog\Models\Category;
use JeroenvanRensen\Blog\Models\Post;
use JeroenvanRensen\Blog\Models\Tag;

class BlogPosts extends ComponentBase
{
    /**
     * An array with all of the posts from the database.
     *
     * @var array
     */
    public $posts;

    /**
     * The name of the page for a single post.
     *
     * @var string
     */
    public $postPage;

    /**
     * Returns the details for this component.
     *
     * @return  array
     */
    public function componentDetails()
    {
        return [
            'name' => 'jeroenvanrensen.blog::lang.components.blogposts.php.component_name',
            'description' => 'jeroenvanrensen.blog::lang.components.blogposts.php.component_description'
        ];
    }

    /**
     * Returns a list of properties for this component.
     *
     * @return  array
     */
    public function defineProperties()
    {
        return [
            'postOrder' => [
                'title' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_title',
                'type' => 'dropdown',
                'default' => 'published_at desc',
                'options' => [
                    'title asc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_title_asc',
                    'title desc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_title_desc',
                    'created_at asc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_created_asc',
                    'created_at desc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_created_desc',
                    'updated_at asc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_updated_asc',
                    'updated_at desc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_updated_desc',
                    'published_at asc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_published_asc',
                    'published_at desc' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postorder_published_desc'
                ]
            ],
            'postPage' => [
                'title' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.postpage_title',
                'type' => 'dropdown',
                'options' => $this->getPages()
            ],
            'categoryFilter' => [
                'title' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.categoryfilter_title',
                'type' => 'string',
                'description' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.categoryfilter_description',
                'default' => '{{ :category }}',
                'validationPattern' => '^[a-z:]*$',
                'validationMessage' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.categoryfilter_validationmessage'
            ],
            'tagFilter' => [
                'title' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.tagfilter_title',
                'type' => 'string',
                'description' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.tagfilter_description',
                'default' => '{{ :tag }}',
                'validationPattern' => '^[a-z:]*$',
                'validationMessage' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.tagfilter_validationmessage'
            ],
            'format' => [
                'title' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.format_title',
                'type' => 'dropdown',
                'description' => 'jeroenvanrensen.blog::lang.components.blogposts.php.options.format_description',
                'default' => 'html',
                'options' => [
                    'html' => 'HTML',
                    'json' => 'JSON'
                ]
            ]
        ];
    }

    /**
     * Sets the $posts and $postPage variable when the component is running.
     *
     * @return  null
     */
    public function onRun()
    {
        $this->posts = $this->getPosts();
        $this->postPage = $this->property('postPage');

        // Return JSON if option is set
        if ($this->property('format') == 'json') {
            return $this->posts;
        }
    }

    /**
     * Returns a list of posts from the database.
     *
     * @return  array
     */
    public function getPosts()
    {
        // Get all published posts

        $posts = Post::where('published_at', '<=', Carbon::now());

        // Apply the tag filter

        if ($this->property('tagFilter')) {
            $tag = Tag::where('slug', $this->property('tagFilter'))->first();

            // Tag not found
            if (! $tag) {
                return $this->controller->run('404');
            }

            $posts = $tag->posts()->where('published_at', '<=', Carbon::now());
        }

        // Apply the category filter

        if ($this->property('categoryFilter')) {
            $category = Category::where('slug', $this->property('categoryFilter'))->first();

            // Category not found
            if (! $category) {
                return $this->controller->run('404');
            }

            $posts = $posts->where('category_id', $category->id);
        }

        // Order the posts

        [$column, $direction] = explode(' ', $this->property('postOrder'));

        $posts = $posts->orderBy($column, $direction);

        // Return the posts

        return $posts->get();
    }

    /**
     * Returns a list of all pages which belong to the active theme.
     *
     * @return  array
     */
    public function getPages()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
}
