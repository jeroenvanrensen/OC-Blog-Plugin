<?php 

namespace JeroenvanRensen\Blog\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use JeroenvanRensen\Blog\Models\Post;

class BlogPost extends ComponentBase
{
    /**
     * The current post
     *
     * @var array
     */
    public $post;

    /**
     * Returns details about this component
     *
     * @return  array
     */
    public function componentDetails()
    {
        return [
            'name' => 'jeroenvanrensen.blog::lang.components.blogpost.php.component_name',
            'description' => 'jeroenvanrensen.blog::lang.components.blogpost.php.component_description'
        ];
    }

    /**
     * Returns a list of properties for this component
     *
     * @return  array
     */
    public function defineProperties()
    {
        return [
            'format' => [
                'title' => 'jeroenvanrensen.blog::lang.components.blogpost.php.options.format_title',
                'type' => 'dropdown',
                'description' => 'jeroenvanrensen.blog::lang.components.blogpost.php.options.format_description',
                'default' => 'html',
                'options' => [
                    'html' => 'HTML',
                    'json' => 'JSON'
                ]
            ]
        ];
    }

    /**
     * Sets the $post variable when this component is running, and if not found return a 404 response
     *
     * @return  null
     */
    public function onRun()
    {
        // Finds the post in the database
        $this->post = Post::where('published_at', '<=', Carbon::now())
            ->where('slug', $this->param('slug'))
            ->first();

        // Returns a 404 message if the post does not exist
        if(!$this->post) {
            return $this->controller->run('404');
        }

        // Returns JSON if option is set
        if($this->property('format') == 'json') {
            return $this->post;
        }
    }
}
