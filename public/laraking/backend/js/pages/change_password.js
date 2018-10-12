var laraking_reset_password = function () {
    var i = $("#m_login");
    return {
        init: function () {
            $("#m_login_change_password_submit").click(function (i) {
                i.preventDefault();
                var a = $(this), e = $(this).closest("form");
                e.validate({
                    rules: {
                        email: {required: !0, email: !0},
                        password: {required: !0, minlength: 6, maxlength: 15},
                        password_confirmation: {required: !0, minlength: 6, maxlength: 15, equalTo: "#password"},
                    }
                }), e.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), e.submit())
            })
        }
    }
}();
jQuery(document).ready(function () {
    laraking_reset_password.init()
});
