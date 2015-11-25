"use strict"
class HubAdmin
  constructor: ->
    $.ajaxSetup headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    this.init_search()
    this.init_submit_status()
    this.init_select()
    this.init_datepicker()
    this.init_userform()
    this.init_translatable()

  init_search: ->
    search = $('#search')
    if search.length > 0
      $('input#search-text').keypress (event) ->
        if event.which == 13
          search.trigger('click')

      search.click ->
        $('input#h-search-text').val($('input#search-text').val())
        $('#search-form').submit()

  init_submit_status: ->
    statusButton = $('.status-button')
    statusField = $('#status_id')
    if statusButton.length > 0 and statusField.length > 0
      statusButton.click (e) ->
        e.preventDefault()
        statusField.val($(this).data('value'))
        $(this).closest('form').submit()

  init_select: ->
    select = $('select.select2').not('.hidden')
    if select.length > 0
      select.select2({ width: '100%' })

  init_datepicker: ->
    datepicker = $('#datepicker').not('.hidden')
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

  init_translatable: ->
    main_row = $('#translatable')

  add_language: (main_row, language_id, fields) ->
    new_field = []
    new_label = []
    for field in fields
      do (field) ->
        new_field.push $(document.createElement('input')).attr('name', language_id + '[' + field + ']').text(field)
        new_label.push $(document.createElement('label')).attr('for', language_id + '[' + field + ']').text(field)
    new_button = $(document.createElement('a')).addClass('btn btn-sm remove-language').attr('data-value', language_id).html('<span class="glyphicon glyphicon-trash"></span>')
    selectColumn = $(document.createElement('div')).addClass('col-md-5').append(new_role)
    labelColumn = $(document.createElement('div')).addClass('col-md-5').append(new_label)
    actionColumn = $(document.createElement('div')).addClass('col-md-2').append(new_button)
    new_lang_box = $(document.createElement('div')).addClass('col-md-6 language-box').append(labelColumn, selectColumn, actionColumn)
    main_row.append(new_lang_box)

  remove_permission: (e, element) ->
    e.preventDefault
    $(context_id).find('option[value='+$(element).data('value')+']').prop('disabled', false)
    $(element).parents('div.permission').remove()

  init_userform: ->
    thisHub = this
    userform = $('#users')
    roles = $('#roles')
    context_id = $('#context_id')
    permissions = $('#permissions')
    $('.remove-permission').each ->
      $(context_id).find('option[value='+$(this).data('value')+']').attr('disabled', 'disabled')

    $(permissions).on 'click', '.remove-permission', (e) ->
      hub.remove_permission(e, this)
      hub.init_select()

    if userform.length > 0 and context_id.length > 0 and permissions.length > 0
      context_id.change (e, item) ->
        # add new element
        thisHub.user_permission(roles, context_id, permissions)
        $(context_id).find('option').filter(':selected').attr('disabled', 'disabled')
        thisHub.init_select()

  user_permission: (roles, context_id, permissions) ->
    new_role = roles.clone(true, true).attr('id', 'role_'+context_id.val()).removeClass('hidden').attr('name', 'permission['+context_id.val()+'][role_id]')
    new_label = $(document.createElement('label')).attr('for', 'permission['+context_id.val()+'][role_id]').text(context_id.find('option').filter(':selected').text())
    new_button = $(document.createElement('a')).addClass('btn btn-sm remove-permission').attr('data-value', context_id.val()).html('<span class="glyphicon glyphicon-trash"></span>')
    selectColumn = $(document.createElement('div')).addClass('col-md-5').append(new_role)
    labelColumn = $(document.createElement('div')).addClass('col-md-5').append(new_label)
    actionColumn = $(document.createElement('div')).addClass('col-md-2').append(new_button)
    new_role_div = $(document.createElement('div')).addClass('row permission form-group').append(labelColumn, selectColumn, actionColumn)
    permissions.append(new_role_div)

hub = new HubAdmin()


