<ul>
{% for strName in arMenu|keys %}
{% if strName == strProcessScreen %}
<li>{{strName}}</li>
{% else %}
<li><a href="?SimpleFormDemo[screen]={{strName}}">{{strName}}</a></li>
{% endif %}
{% endfor %}
</ul>