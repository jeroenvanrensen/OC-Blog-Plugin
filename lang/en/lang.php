<?php

return [
    'plugin' => [
        'name' => 'Blog',
        'description' => 'A simple and extensible blogging plugin',
        'navigation' => [
            'new_post' => 'New Post',
            'all_posts' => 'All Posts',
            'categories' => 'Categories',
        ]
    ],
    'components' => [
        'blogpost' => [
            'html' => [
                'posted' => 'Posted',
                'on_date' => 'on',
                'date_format' => 'F jS Y',
                'at_time' => 'at',
                'time_format' => 'H:i:s',
                'by_author' => 'by',
                'in_category' => 'in',
                'tags' => 'Tags'
            ],
            'php' => [
                'component_name' => 'Single Post',
                'component_description' => 'Shows a single post',
                'options' => [
                    'format_title' => 'Format',
                    'format_description' => 'If you don\'t know what this means, please don\'t change it'
                ]
            ]
        ],
        'blogposts' => [
            'html' => [
                'posted' => 'Posted',
                'on_date' => 'on',
                'date_format' => 'F jS Y',
                'at_time' => 'at',
                'time_format' => 'H:i:s',
                'by_author' => 'by',
                'in_category' => 'in',
                'no_posts_found' => 'No posts found.'
            ],
            'php' => [
                'component_name' => 'List of Posts',
                'component_description' => 'Shows a list of blog posts',
                'options' => [
                    'postorder_title' => 'Post order',
                    'postorder_title_asc' => 'Title (asc)',
                    'postorder_title_desc' => 'Title (desc)',
                    'postorder_created_asc' => 'Created (asc)',
                    'postorder_created_desc' => 'Created (desc)',
                    'postorder_updated_asc' => 'Updated (asc)',
                    'postorder_updated_desc' => 'Updated (desc)',
                    'postorder_published_asc' => 'Published (asc)',
                    'postorder_published_desc' => 'Published (desc)',

                    'postpage_title' => 'Post page',

                    'categoryfilter_title' => 'Category filter',
                    'categoryfilter_description' => 'Provide the url section for the category filter. If empty all posts will be returned.',
                    'categoryfilter_validationmessage' => 'You can only use lower case letters (a-z) and a colon (:) or leave it empty.',

                    'tagfilter_title' => 'Tag filter',
                    'tagfilter_description' => 'Provide the url section for the tag filter. If empty all posts will be returned.',
                    'tagfilter_validationmessage' => 'You can only use lower case letters (a-z) and a colon (:) or leave it empty.',

                    'format_title' => 'Format',
                    'format_description' => 'If you don\'t know what this means, please don\'t change it'
                ]
            ]
        ]
    ],
    'controllers' => [
        'categories' => [
            'html' => [
                'new_category' => 'New Category',
                'delete_list_confirmation' => 'Are you sure you want to delete the selected Categories?',
                'delete_list' => 'Delete selected',
                'categories' => 'Categories',
                'creating_category' => 'Creating category...',
                'create' => 'Create',
                'create_and_close' => 'Create & Close',
                'or' => 'or',
                'cancel' => 'Cancel',
                'return_to_list' => 'Return to categories list',
                'saving_category' => 'Saving category...',
                'save' => 'Save',
                'save_and_close' => 'Save & Close',
                'deleting_category' => 'Deleting Category...',
                'delete_confirmation' => 'Delete this category?'
            ],
            'yaml' => [
                'category' => 'Category',
                'categories' => 'Categories',
                'create_category' => 'Create Category',
                'update_category' => 'Edit Category',
                'no_categories_found' => 'No categories found.',
                'search' => 'Search...'
            ]
        ],
        'posts' => [
            'html' => [
                'new_post' => 'New Post',
                'delete_list_confirmation' => 'Are you sure you want to delete the selected Posts?',
                'delete_list' => 'Delete selected',
                'posts' => 'Posts',
                'creating_post' => 'Creating Post...',
                'create' => 'Create',
                'create_and_close' => 'Create & Close',
                'or' => 'or',
                'cancel' => 'Cancel',
                'return_to_list' => 'Return to post list',
                'saving_post' => 'Saving post...',
                'save' => 'Save',
                'save_and_close' => 'Save & Close',
                'deleting' => 'Deleting Post...',
                'delete_confirmation' => 'Delete this post?'
            ],
            'yaml' => [
                'category' => 'Category',
                'publish_date' => 'Publish Date',
                'published' => 'Published',
                'post' => 'Post',
                'posts' => 'Posts',
                'create_post' => 'Create Post',
                'update_post' => 'Edit Post',
                'no_posts_found' => 'No posts found.',
                'search' => 'Search...'
            ]
        ]
    ],
    'models' => [
        'category' => [
            'columns' => [
                'name' => 'Name',
                'description' => 'Description'
            ],
            'fields' => [
                'name' => 'Name',
                'slug' => 'Slug',
                'description' => 'Description'
            ]
        ],
        'post' => [
            'columns' => [
                'title' => 'Title',
                'body' => 'Body',
                'category' => 'Category',
                'published' => 'Published'
            ],
            'fields' => [
                'title' => 'Title',
                'slug' => 'Slug',
                'edit' => 'Edit',
                'body' => 'Body',
                'properties' => 'Properties',
                'publish' => 'Publish date',
                'publish_comment' => 'Leave empty for no publish date.',
                'featured_image' => 'Featured Image',
                'author' => 'Author',
                'category' => 'Category',
                'excerpt' => 'Excerpt',
                'tags' => 'Tags'
            ]
        ]
    ]
];