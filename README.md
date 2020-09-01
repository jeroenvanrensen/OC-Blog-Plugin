# OctoberCMS Blogging Plugin

A simple and extensible blogging plugin for OctoberCMS.

# Contents

- Features
- Installation & Setup
  - Installation
  - Managing posts
- Components
  - Blogpost
  - Blogposts
- Available languages
- Support

# Features

- You can create and edit posts easily using the WYSISYG editor (What You See Is What You Get)
- You can assign an author and a category to each post
- You can assign multiple tags to each post for better organization
- You can schedule a post for a given date and time
- This plugin is **Open Source**: Everyone can contribute to this plugin using [GitHub](https://github.com/JeroenvanRensen/OC-Blog-Plugin)
- There's a lot of documentation so you can easily find everything you want to know

# Installation & Setup

Follow these steps to get this blogging plugin up and running.

## Installation

Follow these steps to install this plugin.

1. Login to your OctoberCMS Admin Area
2. Navigate to **Settings** > **Updates & Plugins**
3. Click **Install plugins**
4. Search for "JeroenvanRensen Blog"
5. Click at the first result to install
6. Wait for the installation to complete

## Managing posts

Now you see at the top-level navigation an item named **Blog**. Click on it and you will see all your posts. Here you can create new posts, edit and delete posts, and manage categories.

Some field elements are described below:

- **Slug**: A URL-friendly version of the title (only lowercase letters (a-z), numbers (0-9) and dashes (-))
- **Featured image**: The primary image of the post, used on the post list page
- **Excerpt**: A small version of the main content, also used on the post list page
- **Tags**: Labels to organize posts

## Showing posts

You can use these components:

- `blogPost`: Shows a single post
- `blogPosts`: Shows a list of blog posts

*Please take a look at the **Components** section for further details.*

# Components
All components and their documentation.

## Blogpost
Shows a single post.

### Usage
```
[blogPost]
format = "html"
==
{% component 'blogPost' %}
```

### Running Process
The component will search in the database for a post with the same slug as given in the URL. If it couldn't find one, a 404 error will be returned.

If the component should return JSON, the full post will be returned in JSON format. If not, the post will be returned using the default markup.

### Properties
Name | Type | Default value | Description
--- | --- | --- | ---
`format` | dropdown | html | Select if you want to get HTML or JSON as response

### Default HTML Markup
```
{% set post = __SELF__.post %}

<h2>{{ post.title }}</h2>
<p>
    {{ 'jeroenvanrensen.blog::lang.components.blogpost.html.posted' | trans }} 
    {{ 'jeroenvanrensen.blog::lang.components.blogpost.html.on_date' | trans }}  <b>{{ post.published_at | date('jeroenvanrensen.blog::lang.components.blogpost.html.date_format' | trans) }}</b>
    {{ 'jeroenvanrensen.blog::lang.components.blogpost.html.at_time' | trans }}  <b>{{ post.published_at | date('jeroenvanrensen.blog::lang.components.blogpost.html.time_format' | trans) }}</b>
    {{ 'jeroenvanrensen.blog::lang.components.blogpost.html.by_author' | trans }}  <b>{{ post.user.getFullNameAttribute() }}</b>
    {% if post.category_id > 0 %}
    {{ 'jeroenvanrensen.blog::lang.components.blogpost.html.in_category' | trans }}  <b>{{ post.category.name }}</b>
    {% endif %}
</p>
<p>
    <b>{{ 'jeroenvanrensen.blog::lang.components.blogpost.html.tags' | trans }} :</b>
    {% for tag in post.tags %}
        {{ tag.name }}, 
    {% endfor %}
</p>
{% if post.featured_image %}
    <img style="max-width: 100%;" src="{{ post.featured_image.path }}" alt="{{ post.title }}" /><br /><br />
{% endif %}
{{ post.body|raw }}
```

## Blogposts
Shows a list of blog posts.

### Usage
```
[blogPosts]
postOrder = "published_at desc"
postPage = "blog/blog-post"
categoryFilter = "{{ :category }}"
tagFilter = "{{ :tag }}"
format = "html"
==
{% component 'blogPosts' %}
```

### Running Process
If there is no tag given, all published posts will be fetched from the database. If there is a tag given, all published posts will be fetched from the database according to that tag.

If there is a category filter, the category will be searched by slug. If not found, a 404 error will be returned. Else the posts will be filtered by the category.

Last, the posts will be ordered according to the given settings. If JSON should be returned, it will return all posts in JSON format. Else all posts will be returned in the default HTML markup.

### Properties

Name | Type | Default value | Description
--- | --- | --- | ---
`postOrder` | dropdown | published_at desc | The way posts should be ordered
`postPage` | dropdown | blog/post | The page where the blogposts component should link to
`categoryFilter` | string | {{ :category }} | Provide the url section for the category filter. If empty all posts will be returned.
`tagFilter` | string | {{ :tag }} | Provide the url section for the tag filter. If empty all posts will be returned.
`format` | dropdown | html | Select if you want to get HTML or JSON as response

### Default HTML Markup
```
{% for post in __SELF__.posts %}
    <li>
        <h3><a href="{{ __SELF__.postPage|page({ slug: post.slug }) }}">{{ post.title }}</a></h3>
        <p>
            {{ 'jeroenvanrensen.blog::lang.components.blogposts.html.posted' | trans }} 
            {{ 'jeroenvanrensen.blog::lang.components.blogposts.html.on_date' | trans }} <b>{{ post.published_at|date('jeroenvanrensen.blog::lang.components.blogposts.html.date_format' | trans) }}</b>
            {{ 'jeroenvanrensen.blog::lang.components.blogposts.html.at_time' | trans }} <b>{{ post.published_at|date('jeroenvanrensen.blog::lang.components.blogposts.html.time_format' | trans) }}</b>
            {{ 'jeroenvanrensen.blog::lang.components.blogposts.html.by_author' | trans }} <b>{{ post.user.getFullNameAttribute() }}</b>
            {% if post.category_id > 0 %}
                {{ 'jeroenvanrensen.blog::lang.components.blogposts.html.in_category' | trans }} <b>{{ post.category.name }}</b>
            {% endif %}
        </p>
        <p>{{ post.excerpt }}</p>
    </li>
{% else %}
    {{ 'jeroenvanrensen.blog::lang.components.blogposts.html.no_posts_found' | trans }}
{% endfor %}
```

# Available languages

This plugin is currently available in these languages:

- English (en)
- Dutch (nl)

# Support

If you have some questions, found a bug, or have a feature request, please create a new Issue at [GitHub](https://github.com/JeroenvanRensen/OC-Blog-Plugin).
