var laraking_login = function () {
    $("#m_login");
    return {
        init: function () {
            $("#m_login_signin_submit").click(function (i) {
                i.preventDefault();
                var a = $(this), n = $(this).closest("form");
                n.validate({
                    rules: {
                        email: {required: !0, email: !0},
                        password: {required: !0}
                    }
                }), n.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), n.submit())
            })
        }
    }
}();
jQuery(document).ready(function () {
    laraking_login.init()
});
