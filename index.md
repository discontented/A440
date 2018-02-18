{% for file in site.static_files %}
    {% if file.extname == ".md" %}
        {% include_relative {{file.name}} %}
    {% endif %}
{% endfor %}

<!-- # PuTTY Instructions
{% include_relative putty.md %}

# Old Functional Requirements
{% include_relative requirements.md %}

#MySQL Cheatsheet
{% include_relative mysql.md %} -->