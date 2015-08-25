(function() {
  var loadScript, requireJs, scripts;

  loadScript = function(url, callback) {
    var head, script;
    head = document.getElementsByTagName('head')[0];
    script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    script.onreadystatechange = callback;
    script.onload = callback;
    return head.appendChild(script);
  };

  scripts = ["boostrap", ""];

  requireJs = function(scripts) {
    var item;
    item = scripts.pop();
    if (item.length > 0) {
      return loadScript(item, requireJs(scripts));
    }
  };

}).call(this);

//# sourceMappingURL=app.js.map