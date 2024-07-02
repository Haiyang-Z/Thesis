import json

# Load JSON data
with open('Cork historical sites.json', 'r', encoding='utf-8') as f:
    data = json.load(f)

# Read HTML template
with open('templates/template.html', 'r', encoding='utf-8') as f:
    template = f.read()

# Populate template with JSON data
html_content = template.replace('{{ name }}', data['name'])
html_content = html_content.replace('{{ image_file }}', data['image_file'])
html_content = html_content.replace('{{ description }}', data['description'])
html_content = html_content.replace('{{ address }}', data['address'])
html_content = html_content.replace('{{ opening_hours }}', data['opening_hours'])
html_content = html_content.replace('{{ ticket_price }}', data['ticket_price'])
html_content = html_content.replace('{{ website }}', data['website'])
html_content = html_content.replace('{{ contact.phone }}', data['contact']['phone'])
html_content = html_content.replace('{{ contact.email }}', data['contact']['email'])

# Write the generated HTML to a file
with open('output.html', 'w', encoding='utf-8') as f:
    f.write(html_content)

print("Website generated successfully!")
