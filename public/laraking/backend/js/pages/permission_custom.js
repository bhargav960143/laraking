function permission_call_back(e){
    if($(e).prop('checked')){
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: BASE_URL + '/roles/assign_permission',
            data: {per_controller: $(e).data('percontroller'), per_method: $(e).data('permethod'), role_id: $('#role_id').val()},
            success: function( response ) {
                if(response.status == "success"){
                    $("#success_msg_ajax").textContent = "";
                    $("#success_msg_ajax").textContent = response.msg;
                    $("#ajax_success_msg").css('display','block');
                }
                else{
                    $("#failed_msg_ajax").textContent = "";
                    $("#failed_msg_ajax").textContent = response.msg;
                    $("#ajax_failed_msg").css('display','block');
                }
            }
        });
    }
    else{
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: BASE_URL + '/roles/unassign_permission',
            data: {per_controller: $(e).data('percontroller'), per_method: $(e).data('permethod'), role_id: $('#role_id').val()},
            success: function( response ) {
                if(response.status == "success"){
                    $("#success_msg_ajax").textContent = "";
                    $("#success_msg_ajax").textContent = response.msg;
                    $("#ajax_success_msg").css('display','block');
                }
                else{
                    $("#failed_msg_ajax").textContent = "";
                    $("#failed_msg_ajax").textContent = response.msg;
                    $("#ajax_failed_msg").css('display','block');
                }
            }
        });
    }
}
