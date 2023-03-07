// npm package: datatables.net-bs5
// github link: https://github.com/DataTables/Dist-DataTables-Bootstrap5

$(function () {
  'use strict';

  $(function () {

    $('#dataTableExample').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      "orderCellsTop": true,
      "fixedHeader": true,
    });
  });
  $('#dataTableExample').each(function () {
    var datatable = $(this);
    // SEARCH - Add the placeholder for Search and Turn this into in-line form control
    var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
    search_input.attr('placeholder', 'Search');
    search_input.removeClass('form-control-sm');
    // LENGTH - Inline-Form control
    var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
    length_sel.removeClass('form-control-sm');
  });

  $(function () {
    $('#report-tabulasi thead tr')
      .clone(true)
      .addClass('filters')
      .appendTo('#report-tabulasi  thead');

    $('#report-tabulasi ').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      "orderCellsTop": true,
      "fixedHeader": true,
      "initComplete": function () {
        var api = this.api();

        // For each column
        api
          .columns()
          .eq(0)
          .each(function (colIdx) {
            // Set the header cell to contain the input element
            var cell = $('.filters th').eq(
              $(api.column(colIdx).header()).index()
            );
            var title = $(cell).text();
            $(cell).html('<input type="text" class="form-control" placeholder="' + title + '" />');

            // On every keypress in this input
            $(
              'input',
              $('.filters th').eq($(api.column(colIdx).header()).index())
            )
              .off('keyup change')
              .on('change', function (e) {
                // Get the search value
                $(this).attr('title', $(this).val());
                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                var cursorPosition = this.selectionStart;
                // Search the column for that value
                api
                  .column(colIdx)
                  .search(
                    this.value != ''
                      ? regexr.replace('{search}', '(((' + this.value + ')))')
                      : '',
                    this.value != '',
                    this.value == ''
                  )
                  .draw();
              })
              .on('keyup', function (e) {
                e.stopPropagation();

                $(this).trigger('change');
                $(this)
                  .focus()[0]
                  .setSelectionRange(cursorPosition, cursorPosition);
              });
          });
      },
    });
  });
  $('#report-tabulasi').each(function () {
    var datatable = $(this);
    // SEARCH - Add the placeholder for Search and Turn this into in-line form control
    var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
    search_input.attr('placeholder', 'Search');
    search_input.removeClass('form-control-sm');
    // LENGTH - Inline-Form control
    var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
    length_sel.removeClass('form-control-sm');
  });

  $('#exportPdf').DataTable({
    buttons: [
      {
        extend: 'pdf',
        text: 'Save current page',
        exportOptions: {
          modifier: {
            page: 'current'
          }
        }
      }
    ]

  });
});
