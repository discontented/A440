# ToC
{% for file in site.static_files %}
    {% if file.extname == ".md" %}
* [{{ file.path }}]({{site.baseurl}}{{ file.path }})
    {% endif %}
{% endfor %}

<!-- This loops through the paginated posts -->
{% for post in paginator.posts %}
  <h1><a href="{{ post.url }}">{{ post.title }}</a></h1>
  <p class="author">
    <span class="date">{{ post.date }}</span>
  </p>
  <div class="content">
    {{ post.content }}
  </div>
{% endfor %}

# PuTTY Instructions
{% include_relative putty.md %}

# Old Functional Requirements
{% include_relative requirements.md %}

#MySQL Cheatsheet
{% include_relative mysql.md %}