# ToC
{% for file in site.static_files %}
    {% if file.extname == ".md" %}
        * [{{ file.path }}]({{ site.baseurl }}{{ file.path }})
    {% endif %}
{% endfor %}

# PuTTY Instructions
{% include_relative putty.md %}

# Old Functional Requirements
{% include_relative requirements.md %}

#MySQL Cheatsheet
{% include_relative mysql.md %}