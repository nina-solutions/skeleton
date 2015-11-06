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

    statusButton = $('.status-button')
    statusField = $('#status_id')
    if (statusButton.length > 0 && statusField.length > 0)
      statusButton.click (e) ->
        e.preventDefault()
        statusField.val($(this).data('value'))
        $('form').submit

    select = $('select')
    if select.length > 0
      select.select2()

    datepicker = $('#datepicker')
    if datepicker.length > 0
      start = $('#start')
      end = $('#end')
      datepicker.daterangepicker { timePicker: false }
      if start.length > 0 and start.val().length >= 10
        datepicker.data('daterangepicker').startDate = moment(start.val().replace(' ','T'), 'YYYY-MM-DDTHH:mm:ss')
      if end.length > 0 and end.val().length >= 10
        datepicker.data('daterangepicker').endDate = moment(end.val().replace(' ','T'), 'YYYY-MM-DDTHH:mm:ss')
      datepicker.val(start.val() + " - " + end.val())
      datepicker.data('daterangepicker').updateView();
      datepicker.data('daterangepicker').updateCalendars();
      datepicker.on 'apply.daterangepicker', (ev, picker) ->
        $('#start').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'))
        $('#end').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'))

hub = new HubAdmin()

