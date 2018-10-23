$(document).ready(function () {
    var oTable = $('#table_permission_list').DataTable({
        "bStateSave": true,
        "processing": true,
        "bPaginate": true,
        "serverSide": true,
        "bProcessing": true,
        "iDisplayLength": 10,
        "bServerSide": true,
        "sAjaxSource": BASE_URL + "/roles/get_permission_table",
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
            {"data": "permission_no"},
            {"data": "role_name"},
            {"data": "guard_name"},
            {"data": "controller_name"},
            {"data": "permission_name"},
            {"data": "created_date"},
            {"data": "permission_no"},
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
            aoData.push({name: 'role_id', value: role_id});
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
            $('body').css('min-height', ($('#table_permission_list tr').length * 50) + 200);
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
                    var token_hash = $('meta[name="csrf-token"]').attr('content');
                    roles_action = '<form method="POST" name="form_'+ data +'" action="' + BASE_URL + "/roles/remove_permission" + '" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm(\'Are you sure you want to delete?\');"><input name="role_id" type="hidden" value="'+row.role_id+'"><input name="permission_id" type="hidden" value="'+row.permission_id+'"><input name="_token" type="hidden" value="'+token_hash+'"><input class="btn btn-xs btn-danger" type="submit" value="Delete"></form>&nbsp;';

                    return [
                        roles_action
                    ].join('');

                },
                "targets": $('#table_permission_list th#action').index(),
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
