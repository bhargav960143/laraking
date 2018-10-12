<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{trans('label.reset_password_subject')}}</title>
    <style type="text/css">
        html {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
            *[class="table_width_100"] {
                width: 96% !important;
            }

            *[class="border-right_mob"] {
                border-right: 1px solid #dddddd;
            }

            *[class="mob_100"] {
                width: 100% !important;
            }

            *[class="mob_center"] {
                text-align: center !important;
            }

            *[class="mob_center_bl"] {
                float: none !important;
                display: block !important;
                margin: 0px auto;
            }

            .iage_footer a {
                text-decoration: none;
                color: #929ca8;
            }

            img.mob_display_none {
                width: 0px !important;
                height: 0px !important;
                display: none !important;
            }

            img.mob_width_50 {
                width: 40% !important;
                height: auto !important;
            }
        }

        .table_width_100 {
            width: 680px;
        }
    </style>
</head>

<body style="padding: 0px; margin: 0px;">
<div id="mailsub" class="notification" align="center">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
        <tr>
            <td align="center" bgcolor="#eff3f8">


                <!--[if gte mso 10]>
                <table width="680" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                <![endif]-->

                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%"
                       style="max-width: 680px; min-width: 300px;">
                    <!--header -->
                    <tr>
                        <td align="center" bgcolor="#eff3f8">
                            <!-- padding -->
                            <div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
                            <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left">
                                        &nbsp;
                                    </td>
                                </tr>
                            </table>
                            <!-- padding -->
                        </td>
                    </tr>
                    <!--header END-->

                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <!-- padding -->
                                        <div style="height: 25px; line-height: 25px; font-size: 10px;">&nbsp;</div>
                                        <div>
                                            <a href="{{url('securepanel')}}" target="_blank"
                                               style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                <font
                                                    face="Arial, Helvetica, sans-seri; font-size: 13px;"
                                                    size="3" color="#596167">
                                                    <img
                                                        src="{{url('laraking/img/logo.png')}}"
                                                        width="100" height="100"
                                                        alt="{{config('app.name')}}"
                                                        border="0"
                                                        style="display: block;"/></font></a>
                                        </div>
                                        <!-- padding -->
                                        <div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!--content 1 -->
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <!-- padding -->
                                        <div style="line-height: 44px;">
                                            <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e"
                                                  style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						{{trans('label.reset_password_title')}}
					</span></font>
                                        </div>
                                        <!-- padding -->
                                        <div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <div style="line-height: 30px;">
                                            <font face="Arial, Helvetica, sans-serif" size="5" color="#4db3a4"
                                                  style="font-size: 17px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 17px; color: #4db3a4;">
						{{trans('label.reset_password_title_hi')}} {{$name}}, your forgot password request recieved.
					</span></font>
                                        </div>
                                        <!-- padding -->
                                        <div style="height: 35px; line-height: 35px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <div style="line-height: 24px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="4"
                                                              color="#57697e" style="font-size: 16px;">
									<span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
                                        {{trans('label.reset_password_sub_one')}}
									</span></font>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- padding -->
                                        <div style="height: 45px; line-height: 45px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <div style="line-height:24px;">
                                            <a href="{{url('securepanel/password/reset/' . $reset_token)}}" target="_blank"
                                               style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3"
                                                      color="#596167">
                                                    <img src="{{url('laraking/backend/img/reset-password.gif')}}"
                                                         width="225" height="43" alt="Reset Password" border="0"
                                                         style="display: block;"/></font></a>
                                        </div>
                                        <div style="height: 45px; line-height: 45px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <div style="line-height: 24px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="4"
                                                              color="#57697e" style="font-size: 16px;">
									<span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #57697e;">
                                        {{trans('label.reset_password_sub_two')}}&nbsp;{{url('securepanel/password/reset/' . $reset_token)}}
									</span></font>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- padding -->
                                        <div style="height: 45px; line-height: 45px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <div style="line-height: 24px;">
                                                        <font face="Arial, Helvetica, sans-serif" size="4"
                                                              color="#57697e" style="font-size: 16px;">
									<span
                                        style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
                                        {{trans('label.reset_password_sub_three')}}
									</span></font>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- padding -->
                                        <div style="height: 45px; line-height: 45px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--content 1 END-->

                    <!--links -->
                    <tr>
                        <td align="center" bgcolor="#f9fafc">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <!-- padding -->
                                        <div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                                        <table width="80%" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center" valign="middle"
                                                    style="font-size: 12px; line-height:22px;">
                                                    <font face="Tahoma, Arial, Helvetica, sans-serif" size="2"
                                                          color="#282f37" style="font-size: 12px;">
								<span
                                    style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #5b9bd1;">
		              <a href="{{trans('label.email_general_question_url')}}" target="_blank" style="color: #5b9bd1; text-decoration: none;">{{trans('label.email_general_question')}}</a>
		              &nbsp;&nbsp;&nbsp;&nbsp;<img src="{{url('laraking/backend/img/dot.gif')}}" alt="|"
                                                   width="6" height="9" class="mob_display_none"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
		              <a href="{{trans('label.email_terms_condition_url')}}" target="_blank"
                         style="color: #5b9bd1; text-decoration: none;">{{trans('label.email_terms_condition')}}</a>
		              &nbsp;&nbsp;&nbsp;&nbsp;<img src="{{url('laraking/backend/img/dot.gif')}}" alt="|"
                                                   width="6" height="9" class="mob_display_none"/>&nbsp;&nbsp;&nbsp;&nbsp;
		              <a href="{{trans('label.email_need_help_url')}}" target="_blank" style="color: #5b9bd1; text-decoration: none;">{{trans('label.email_need_help')}}</a>
              </span></font>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                                        <table border="0" cellspacing="0"
                                               cellpadding="0">
                                            <tr>
                                                <td width="30" align="center"
                                                    style="line-height: 19px;">
                                                    <a href="{{trans('label.facebook_url')}}" target="_blank"
                                                       style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                        <font
                                                            face="Arial, Helvetica, sans-serif"
                                                            size="2" color="#596167">
                                                            <img
                                                                src="{{url('laraking/backend/img/facebook.png')}}"
                                                                width="10" height="19"
                                                                alt="{{ trans('label.email_facebook_title') }}"
                                                                border="0"
                                                                style="display: block;"/></font></a>
                                                </td>
                                                <td width="39" align="center"
                                                    style="line-height: 19px;">
                                                    <a href="{{trans('label.twitter_url')}}" target="_blank"
                                                       style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                        <font
                                                            face="Arial, Helvetica, sans-serif"
                                                            size="2" color="#596167">
                                                            <img
                                                                src="{{url('laraking/backend/img/twitter.png')}}"
                                                                width="19" height="16"
                                                                alt="{{ trans('label.email_twitter_title') }}"
                                                                border="0"
                                                                style="display: block;"/></font></a>
                                                </td>
                                                <td width="29" align="right"
                                                    style="line-height: 19px;">
                                                    <a href="{{trans('label.dribbble_url')}}" target="_blank"
                                                       style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                        <font
                                                            face="Arial, Helvetica, sans-serif"
                                                            size="2" color="#596167">
                                                            <img
                                                                src="{{url('laraking/backend/img/dribbble.png')}}"
                                                                width="19" height="19"
                                                                alt="{{ trans('label.email_dribbble_title') }}"
                                                                border="0"
                                                                style="display: block;"/></font></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td><!-- padding -->
                                        <div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--links END-->

                    <!--footer -->
                    <tr>
                        <td class="iage_footer" align="center" bgcolor="#eff3f8">
                            <!-- padding -->
                            <div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5"
                                              style="font-size: 13px;">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					{{trans('label.email_copy_rights_text')}}
				</span></font>
                                    </td>
                                </tr>
                            </table>

                            <!-- padding -->
                            <div style="height: 50px; line-height: 50px; font-size: 10px;">&nbsp;</div>
                        </td>
                    </tr>
                    <!--footer END-->
                </table>
                <!--[if gte mso 10]>
                </td></tr>
                </table>
                <![endif]-->

            </td>
        </tr>
    </table>

</div>
</body>
</html>
