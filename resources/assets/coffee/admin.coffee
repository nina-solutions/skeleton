"use strict"
class HubAdmin
  constructor: () ->
    $.ajaxSetup headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    search = $('#search')
    if search.length > 0
      $('input#search-text').keypress (event) ->
        if(event.which == 13)
          search.trigger('click')

      search.click ->
        $('input#h-search-text').val($('input#search-text').val())
        $('#search-form').submit()

    select = $('select')
    if select.length > 0
      select.select2()

    datepicker = $('#datepicker')
    if datepicker.length > 0
      start = $('#start')
      end = $('#end')
      datepicker.daterangepicker { timePicker: true, timePicker24Hour: true }
      if start.length > 0
        datepicker.data('daterangepicker').setStartDate(start.val().substr(0,10))
      if end.length > 0
        datepicker.data('daterangepicker').setEndDate(end.val().substr(0,10))
      datepicker.on 'apply.daterangepicker', (ev, picker) ->
        $('#start').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'))
        $('#end').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'))

hub = new HubAdmin()

