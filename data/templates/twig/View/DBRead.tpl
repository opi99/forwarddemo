Data in DB:<br />
{% for row in arData %}
{% for key, value in row %}
{{key}} = {{value}}<br />
{% endfor %}
{% endfor %}
