$(document).ready(function () {
    var oTable = $('#table_errors_list').DataTable({
        "bStateSave": true,
        "processing": true,
        "bPaginate": true,
        "serverSide": true,
        "bProcessing": true,
        "iDisplayLength": 10,
        "bServerSide": true,
        "sAjaxSource": BASE_URL + "/tracker/get_errors_table",
        'bPaginate': true,
        'initComplete':function () {
        },
        "scrollX": true,
        "fnServerParams": function (aoData) {

            var acolumns = this.fnSettings().aoColumns,
                columns = [];
            $.each(acolumns, function (i, item) {
                columns.push(item.data);
            });
            aoData.push({name: 'columns', value: columns});
        },

        "columns": [
            {"data": "error_no"},
            {"data": "code"},
            {"data": "message"},
            {"data": "created_date"},
        ],
        "order": [[0, "desc"]],
        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        "oLanguage": {
            "sLengthMenu": "_MENU_"
        },
        "fnInitComplete": function () {},
        'fnServerData': function (sSource, aoData, fnCallback) {
            $.ajax
            ({
                'dataType': 'json',
                'type': 'POST',
                'url': sSource,
                'data': aoData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                'success': fnCallback
            });
        },
        "fnDrawCallback": function () {
            $('body').css('min-height', ($('#table_errors_list tr').length * 50) + 200);
            $(window).trigger('resize');
        },
        "dom":"<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",

        buttons: [
            {
                extend:    'print',
                text:      '<i class="fa fa-print fa-2x" aria-hidden="true"></i>',
                titleAttr: 'Print'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-external-link fa-2x" aria-hidden="true"></i>',
                titleAttr: 'CSV'
            },
        ],
        "columnDefs": [
            {
                "render": function (data, type, row) {
                    var error_info = "";
                    if(data != null && data != ""){
                        error_info = '<span class="m-badge  m-badge--danger m-badge--wide">' + data + '</span>';
                    }
                    return [
                        error_info
                    ].join('');

                },
                "targets": $('#table_errors_list th#code').index(),
                "orderable": false,
                "searchable": false
            }
        ]
    });


    $('.dataTables_filter input').attr('placeholder', 'Search...');


//DOM Manipulation to move datatable elements integrate to panel
    $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-left")).find("label").addClass("panel-ctrls-center");
    $('.panel-ctrls').append("<i class='separator'></i>");
    $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

    $('.panel-footer').append($(".dataTable+.row"));
    $('.dataTables_paginate>ul.pagination').addClass("pull-right m0");
});
