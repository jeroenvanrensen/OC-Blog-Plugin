<?php

namespace JeroenvanRensen\Blog\Updates;

use JeroenvanRensen\Blog\Models\Category;
use JeroenvanRensen\Blog\Models\Post;
use JeroenvanRensen\Blog\Models\Tag;
use Seeder;

class SeedUsersTable extends Seeder
{
    public function run()
    {
        $category = Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized'
        ]);

        $tag = Tag::create([
            'name' => 'first post',
            'slug' => 'first-post'
        ]);

        $post = Post::create([
            'user_id' => 1,
            'category_id' => $category->id,
            'title' => 'Your first post',
            'slug' => 'your-first-post',
            'excerpt' => 'This is your first blog post.',
            'body' => '<p>Hello, this is your first post. You can edit or delete it, and start writing!</p>',
            'published_at' => \Carbon\Carbon::now()
        ]);

        \DB::insert('insert into jeroenvanrensen_blog_post_tag (post_id, tag_id) values (?, ?)', [$post->id, $tag->id]);
    }
}
