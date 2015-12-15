(function() {
  (function($) {
    var analink, blogger, category, channel, file1, file2, file3, file4, file5, isother, photographer, rmcaltro, visa_interesse, visa_other_interesse, vits_ajax_url, vits_codice__content, vits_codice__wrapper, vits_nazioni, workfor;
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
    analink = $('textarea[name="ANA_LINK_ARTICOLI"]');
    workfor.change(function() {
      return category.trigger("change");
    });
    category.change(function() {
      var lab;
      $('fieldset.hidden').removeClass('hidden');
      switch (channel) {
        case '22':
          break;
        case '24':
          if (photographer.length > 0) {
            if (category.find(':selected').text() === 'Fotografo' || category.find(':selected').text() === 'Photographer') {
              photographer.val(1);
              file4.parent().parent().show();
              file5.parent().parent().show();
            } else {
              photographer.val(0);
              if (file4.length > 0) {
                file4.parent().parent().hide();
              }
              if (file5.length > 0) {
                file5.parent().parent().hide();
              }
            }
            file1.parent().parent().find('label.' + photographer.val()).show();
            lab = photographer.val() === "0" ? "1" : "0";
            if (file1.parent().parent().find('label.' + lab).length > 0) {
              file1.parent().parent().find('label.' + lab).hide();
            }
          }
          break;
        case '23':
          if (blogger.length > 0) {
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
            }
          }
          break;
        case '33':
          if (blogger.length > 0) {
            if (category.find(':selected').text() === 'Blogger') {
              blogger.val(1);
              file2.parent().parent().show();
              if (file1.length > 0) {
                file1.parent().parent().hide();
              }
              if (file5.length > 0) {
                file5.parent().parent().hide();
              }
            } else {
              blogger.val(0);
              file1.parent().parent().show();
              file5.parent().parent().show();
              if (file2.length > 0) {
                file2.parent().parent().hide();
              }
            }
            analink.parent().parent().find('label.' + blogger.val()).show();
            analink.attr('placeholder', analink.parent().parent().find('label.' + blogger.val()).text());
            lab = blogger.val() === "0" ? "1" : "0";
            if (analink.parent().parent().find('label.' + lab).length > 0) {
              analink.parent().parent().find('label.' + lab).hide();
            }
          }
          break;
      }
      if (rmcaltro.length > 0) {
        rmcaltro.parent().parent().removeClass('hidden');
        if (category.find(':selected').text().toLowerCase() === 'altro' || category.find(':selected').text().toLowerCase() === 'other') {
          isother.val('1');
          return rmcaltro.parent().parent().show();
        } else {
          isother.val('0');
          rmcaltro.text('');
          return rmcaltro.parent().parent().hide();
        }
      }
    });
    category.trigger('change');
    vits_nazioni = $('select[name="VISA_ELENCONAZIONIAMBASCIATE"]');
    vits_codice__wrapper = $('.vits_codice__wrapper');
    vits_codice__content = $('.vits_codice__content');
    vits_ajax_url = "/en/visa/ajax/";
    vits_nazioni.change(function() {
      if (vits_nazioni.val() !== "") {
        return $.ajax({
          url: vits_ajax_url + "embassy/",
          dataType: "html",
          data: {
            nation: vits_nazioni.val(),
            "default": vits_codice__content.find('input[type=hidden]').val()
          },
          error: function(jqXHR, textStatus, errorThrown) {
            return console.log("AJAX Error: " + textStatus);
          },
          success: function(data, textStatus, jqXHR) {
            console.log("Successful AJAX call: " + data);
            vits_codice__content.html(data);
            return vits_codice__wrapper.addClass('active');
          }
        });
      }
    });
    vits_nazioni.trigger('change');
    visa_interesse = $('select[name="VISA_SETTOREINTERESSE"]');
    visa_other_interesse = $('#VISA_SETTOREINTERESSE_OTHER');
    visa_interesse.change(function() {
      if (visa_interesse.val().toLowerCase() !== "other") {
        return visa_other_interesse.parent().parent().addClass('hidden');
      } else {
        return visa_other_interesse.parent().parent().removeClass('hidden');
      }
    });
    return visa_interesse.trigger('change');
  })(jQuery);

}).call(this);

(function() {
  "use strict";
  var HubAdmin, hub;

  HubAdmin = (function() {
    function HubAdmin() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      this.init_search();
      this.init_submit_status();
      this.init_select();
      this.init_datepicker();
      this.init_userform();
    }

    HubAdmin.prototype.init_search = function() {
      var search;
      search = $('#search');
      if (search.length > 0) {
        $('input#search-text').keypress(function(event) {
          if (event.which === 13) {
            return search.trigger('click');
          }
        });
        return search.click(function() {
          $('input#h-search-text').val($('input#search-text').val());
          return $('#search-form').submit();
        });
      }
    };

    HubAdmin.prototype.init_submit_status = function() {
      var statusButton, statusField;
      statusButton = $('.status-button');
      statusField = $('#status_id');
      if (statusButton.length > 0 && statusField.length > 0) {
        return statusButton.click(function(e) {
          e.preventDefault();
          statusField.val($(this).data('value'));
          return $(this).closest('form').submit();
        });
      }
    };

    HubAdmin.prototype.init_select = function() {
      var select;
      select = $('select.select2').not('.hidden');
      if (select.length > 0) {
        return select.select2({
          width: '100%'
        });
      }
    };

    HubAdmin.prototype.init_datepicker = function() {
      var datepicker, end, start;
      datepicker = $('#datepicker').not('.hidden');
      if (datepicker.length > 0) {
        start = $('#start');
        end = $('#end');
        datepicker.daterangepicker({
          timePicker: false
        });
        if (start.length > 0 && start.val().length >= 10) {
          datepicker.data('daterangepicker').startDate = moment(start.val().replace(' ', 'T'), 'YYYY-MM-DDTHH:mm:ss');
        }
        if (end.length > 0 && end.val().length >= 10) {
          datepicker.data('daterangepicker').endDate = moment(end.val().replace(' ', 'T'), 'YYYY-MM-DDTHH:mm:ss');
        }
        datepicker.val(start.val() + " - " + end.val());
        datepicker.data('daterangepicker').updateView();
        datepicker.data('daterangepicker').updateCalendars();
        return datepicker.on('apply.daterangepicker', function(ev, picker) {
          $('#start').val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
          return $('#end').val(picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
        });
      }
    };

    HubAdmin.prototype.remove_permission = function(e, element) {
      e.preventDefault;
      $(context_id).find('option[value=' + $(element).data('value') + ']').prop('disabled', false);
      return $(element).parents('div.permission').remove();
    };

    HubAdmin.prototype.init_userform = function() {
      var context_id, permissions, roles, thisHub, userform;
      thisHub = this;
      userform = $('#users');
      roles = $('#roles');
      context_id = $('#context_id');
      permissions = $('#permissions');
      $('.remove-permission').each(function() {
        return $(context_id).find('option[value=' + $(this).data('value') + ']').attr('disabled', 'disabled');
      });
      $(permissions).on('click', '.remove-permission', function(e) {
        hub.remove_permission(e, this);
        return hub.init_select();
      });
      if (userform.length > 0 && context_id.length > 0 && permissions.length > 0) {
        return context_id.change(function(e, item) {
          thisHub.user_permission(roles, context_id, permissions);
          $(context_id).find('option').filter(':selected').attr('disabled', 'disabled');
          return thisHub.init_select();
        });
      }
    };

    HubAdmin.prototype.user_permission = function(roles, context_id, permissions) {
      var actionColumn, labelColumn, new_button, new_label, new_role, new_role_div, selectColumn;
      new_role = roles.clone(true, true).attr('id', 'role_' + context_id.val()).removeClass('hidden').attr('name', 'permission[' + context_id.val() + '][role_id]');
      new_label = $(document.createElement('label')).attr('for', 'permission[' + context_id.val() + '][role_id]').text(context_id.find('option').filter(':selected').text());
      new_button = $(document.createElement('a')).addClass('btn btn-sm remove-permission').attr('data-value', context_id.val()).html('<span class="glyphicon glyphicon-trash"></span>');
      selectColumn = $(document.createElement('div')).addClass('col-md-5').append(new_role);
      labelColumn = $(document.createElement('div')).addClass('col-md-5').append(new_label);
      actionColumn = $(document.createElement('div')).addClass('col-md-2').append(new_button);
      new_role_div = $(document.createElement('div')).addClass('row permission form-group').append(labelColumn, selectColumn, actionColumn);
      return permissions.append(new_role_div);
    };

    return HubAdmin;

  })();

  hub = new HubAdmin();

}).call(this);

//# sourceMappingURL=app.js.map