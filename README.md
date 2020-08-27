# OctoberCMS Blogging Plugin Documentation
A simple and extensible blogging plugin for OctoberCMS.

# Contents
* Components
	* Blogpost
	* Blogposts
* Available languages

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
* English (en)
* Dutch (nl)
