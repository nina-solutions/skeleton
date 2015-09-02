(($) ->
  blogger = $('input[name="IS_BLOGGER"]')
  isother = $('input[name="IS_OTHER"]')
  rmcaltro = $('input[name="RMC_ALTRO"]')
  photographer = $('input[name="IS_FOTOGRAFO"]')
  channel = $('input[name="channel"]').val()


  category = $('select[name="SOC_ID"]')
  workfor = $('select[name="UTY_ID"]')
  file1 = $('input[name="ANA_FILENAME1"]')
  file2 = $('input[name="ANA_FILENAME2"]')
  file3 = $('input[name="ANA_FILENAME3"]')
  file4 = $('input[name="ANA_FILENAME4"]')
  file5 = $('input[name="ANA_FILENAME5"]')
  analink = $('textarea[name="ANA_LINK_ARTICOLI"]')

  workfor.change ->
    category.trigger "change"

  category.change ->
    $('fieldset.hidden').removeClass('hidden')
    switch channel
      when '22'
        break
      when '24'
        if photographer.length > 0
          if category.find(':selected').text() == 'Fotografo' or category.find(':selected').text() == 'Photographer'
            photographer.val(1)
            file4.parent().parent().show()
            file5.parent().parent().show()
          else
            photographer.val(0)
            if file4.length > 0
              file4.parent().parent().hide()
            if file5.length > 0
              file5.parent().parent().hide()

          file1.parent().parent().find('label.' + photographer.val()).show()
          lab = if photographer.val() == "0" then "1" else "0";
          if (file1.parent().parent().find('label.' + lab).length > 0)
            file1.parent().parent().find('label.' + lab).hide()
        break
      when '23'
        if blogger.length > 0
          if category.find(':selected').text() == 'Blogger' or workfor.find(':selected').text() == 'Blog'
            blogger.val(1)
            file3.parent().parent().show()
            analink.parent().parent().show()

            if file1.length > 0
              file1.parent().parent().hide()
            if file2.length > 0
              file2.parent().parent().hide()
            if file5.length > 0
              file5.parent().parent().hide()
          else
            blogger.val(0)
            file1.parent().parent().show()
            file2.parent().parent().show()
            file5.parent().parent().show()

            if analink.length > 0
              analink.parent().parent().hide()
            if file3.length > 0
              file3.parent().parent().hide()
        break
      when '33'
        if blogger.length > 0
          if (category.find(':selected').text() == 'Blogger')
            blogger.val(1)
            file2.parent().parent().show()
            if file1.length > 0
              file1.parent().parent().hide()
            if file5.length > 0
              file5.parent().parent().hide()
          else
            blogger.val(0)
            file1.parent().parent().show()
            file5.parent().parent().show()
            if file2.length > 0
              file2.parent().parent().hide()
          analink.parent().parent().find('label.' + blogger.val()).show()
          analink.attr('placeholder', analink.parent().parent().find('label.' + blogger.val()).text())
          lab = if blogger.val() == "0" then "1" else "0";
          if (analink.parent().parent().find('label.' + lab).length > 0)
            analink.parent().parent().find('label.' + lab).hide()
        break
    if rmcaltro.length > 0
      rmcaltro.parent().parent().removeClass('hidden')
      if category.find(':selected').text().toLowerCase() == 'altro' or category.find(':selected').text().toLowerCase() == 'other'
        isother.val('1');
        rmcaltro.parent().parent().show()
      else
        isother.val('0');
        rmcaltro.text('')
        rmcaltro.parent().parent().hide()

  category.trigger 'change'
) jQuery
