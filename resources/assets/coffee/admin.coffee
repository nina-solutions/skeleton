
class HubAdmin
  constructor: () ->
    $.ajaxSetup headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    if $('#search').length > 0
      $('input#search-text').keypress (event) ->
        if(event.which == 13)
          $('#search').trigger('click')

      $('#search').click ->
        $('input#h-search-text').val($('input#search-text').val())
        $('#search-form').submit()

hub = new HubAdmin()

