loadScript = (url, callback) ->
  # Adding the script tag to the head
  head = document.getElementsByTagName('head')[0]
  script = document.createElement('script')
  script.type = 'text/javascript'
  script.src = url

  # Then bind the event to the callback function.
  # There are several events for cross browser compatibility.
  script.onreadystatechange = callback
  script.onload = callback

  # Fire the loading
  head.appendChild(script);

# Remember, order is foundamental! first jquery then bootstrap etc..
scripts = [
  "js/jquery/jquery2.js",
  "js/bootstrap/bootstrap.js",
  "js/bootstrap/bootstrap/affix.js",
  "js/bootstrap/bootstrap/alert.js",
  "js/bootstrap/bootstrap/dropdown.js"
  ""
]

# Load each sciprts until i have some
requireJs = (scripts) ->
  item = scripts.pop();
  if(item.length > 0)
    loadScript(item,requireJs(scripts))

requireJs(scripts)