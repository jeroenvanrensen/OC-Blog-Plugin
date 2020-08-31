<?php

namespace JeroenvanRensen\Blog;

use Backend\Facades\Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * Returns the details about this plugin
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'jeroenvanrensen.blog::lang.plugin.name',
            'description' => 'jeroenvanrensen.blog::lang.plugin.description',
            'author' => 'JeroenvanRensen',
            'homepage' => 'https://www.jeroenvanrensen.nl/',
            'icon' => 'icon-pencil'
        ];
    }

    /**
     * Register all the components which belong to this plugin
     *
     * @return  array
     */
    public function registerComponents()
    {
        return [
            'JeroenvanRensen\Blog\Components\BlogPosts' => 'blogPosts',
            'JeroenvanRensen\Blog\Components\BlogPost' => 'blogPost',
        ];
    }
            public function registerPermissions()
    {
        return [
            'JeroenvanRensen.config_permission' => [
                'label' => 'Blog access',
                'tab'   => 'Access'
            ],
        ];
    }  

    /**
     * Register backend navigation for this plugin.
     *
     * @return  array
     */
    public function registerNavigation()
    {
        return [
            'blog' => [
                'label' => 'jeroenvanrensen.blog::lang.plugin.name',
                'url' => Backend::url('jeroenvanrensen/blog/posts'),
                'icon' => 'icon-pencil',
                'permissions' => ['JeroenvanRensen.*'],
                'sideMenu' => [
                    'newPost' => [
                        'label' => 'jeroenvanrensen.blog::lang.plugin.navigation.new_post',
                        'url' => Backend::url('jeroenvanrensen/blog/posts/create'),
                        'icon' => 'icon-plus'
                    ],
                    'allPosts' => [
                        'label' => 'jeroenvanrensen.blog::lang.plugin.navigation.all_posts',
                        'url' => Backend::url('jeroenvanrensen/blog/posts'),
                        'icon' => 'icon-copy'
                    ],
                    'categories' => [
                        'label' => 'jeroenvanrensen.blog::lang.plugin.navigation.categories',
                        'url' => Backend::url('jeroenvanrensen/blog/categories'),
                        'icon' => 'icon-list'
                    ]
                ]
            ]
        ];
    }
}
