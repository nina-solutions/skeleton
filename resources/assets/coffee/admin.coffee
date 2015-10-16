
class HubAdmin
  constructor: () ->
    if $('#press-search').length > 0
      $('input#search-text').keypress (event) ->
        if(event.which == 13)
          $('#press-search').trigger('click')

      $('#press-search').click ->
        $('input#h-search-text').val($('input#search-text').val())
        $('#search-form').submit()

hub = new HubAdmin()

