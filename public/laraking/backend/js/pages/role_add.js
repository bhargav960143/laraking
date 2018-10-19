var laraking_roles = function () {
    $("#form_role_add");
    return {
        init: function () {
            $("#m_role_add_submit").click(function (i) {
                i.preventDefault();
                var a = $(this), n = $(this).closest("form");
                n.validate({
                    rules: {
                        role_name: {required: !0},
                    }
                }), n.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), n.submit())
            })
        }
    }
}();
jQuery(document).ready(function () {
    laraking_roles.init()
});
