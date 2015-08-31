(function() {
  (function($) {
    var analink, blogger, category, channel, file1, file2, file3, file4, file5, isother, photographer, rmcaltro, workfor;
    blogger = $('input[name="IS_BLOGGER"]');
    isother = $('input[name="IS_OTHER"]');
    rmcaltro = $('input[name="RMC_ALTRO"]');
    photographer = $('input[name="IS_FOTOGRAFO"]');
    channel = $('input[name="channel"]').val();
    category = $('select[name="SOC_ID"]');
    workfor = $('select[name="UTY_ID"]');
    file1 = $('input[name="ANA_FILENAME1"]');
    file2 = $('input[name="ANA_FILENAME2"]');
    file3 = $('input[name="ANA_FILENAME3"]');
    file4 = $('input[name="ANA_FILENAME4"]');
    file5 = $('input[name="ANA_FILENAME5"]');
    analink = $('input[name="ANA_LINK_ARTICOLI"]');
    return category.change(function() {
      if (blogger.length > 0) {
        $('fieldset.hidden').removeClass('hidden');
        switch (channel) {
          case '23':
            if (category.find(':selected').text() === 'Blogger' || workfor.find(':selected').text() === 'Blog') {
              blogger.val(1);
              file3.parent().parent().show();
              analink.parent().parent().show();
              if (file1.length > 0) {
                file1.parent().parent().hide();
              }
              if (file2.length > 0) {
                file2.parent().parent().hide();
              }
              if (file4.length > 0) {
                file4.parent().parent().hide();
              }
              if (file5.length > 0) {
                file5.parent().parent().hide();
              }
            } else {
              blogger.val(0);
              file1.parent().parent().show();
              file2.parent().parent().show();
              file5.parent().parent().show();
              if (analink.length > 0) {
                analink.parent().parent().hide();
              }
              if (file3.length > 0) {
                file3.parent().parent().hide();
              }
              if (file4.length > 0) {
                file4.parent().parent().hide();
              }
            }
            break;
          case '33':
            if (category.find(':selected').text() === 'Blogger') {
              file2.parent().parent().show();
              analink.parent().parent().show();
              if (file1.length > 0) {
                file1.parent().parent().hide();
              }
              if (file3.length > 0) {
                file3.parent().parent().hide();
              }
              if (file4.length > 0) {
                file4.parent().parent().hide();
              }
              if (file5.length > 0) {
                file5.parent().parent().hide();
              }
            } else {
              blogger.val(0);
              file1.parent().parent().show();
              analink.parent().parent().show();
              file5.parent().parent().show();
              if (file2.length > 0) {
                file2.parent().parent().hide();
              }
              if (file3.length > 0) {
                file3.parent().parent().hide();
              }
              if (file4.length > 0) {
                file4.parent().parent().hide();
              }
            }
        }
      }
      if (rmcaltro.length > 0) {
        rmcaltro.parent().parent().removeClass('hidden');
        if (category.find(':selected').text().toLowerCase() === 'altro' || category.find(':selected').text().toLowerCase() === 'other') {
          return rmcaltro.parent().parent().show();
        } else {
          rmcaltro.text('');
          return rmcaltro.parent().parent().hide();
        }
      }
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=app.js.map