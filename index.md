# ToC
{% for file in site.static_files %}
    {% if file.extname == ".md" %}
* [{{ file.path }}]({{ file.path }})
    {% endif %}
{% endfor %}

   {% for item in site.data.samplelist.docs %}
      <li><a href="{{ item.url }}" alt="{{ item.title }}">{{ item.title }}</a></li>
   {% endfor %}

# PuTTY Instructions
{% include_relative putty.md %}

# Old Functional Requirements
{% include_relative requirements.md %}

#MySQL Cheatsheet
{% include_relative mysql.md %}