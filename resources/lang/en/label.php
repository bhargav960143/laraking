<?php

return [
    /*
     * Front End
     */
    'backend_login_title' => "Welcome to laraking backend.",
    'backend_login_description' => "Premium Laravel Admin Panel.",
    'home_title' => "Laraking",


    /*
     * Secure Panel
     */
    'secure_panel_login_error_message'                      => 'These credentials do not match our records.',
    'secure_panel_login_block_message'                      => 'Too many login attempts. Please try again in :seconds seconds.',
    'secure_panel_login_error_message_one'                  => 'Oops!',
    'secure_panel_login_error_message_two'                  => 'There were problems with the entry:',
    'secure_panel_forgot_password_title'                    => 'Forget Password ?',
    'secure_panel_change_password_title'                    => 'Change Password',
    'secure_panel_change_password_title_sub'                => 'Enter your password and confirm password to change your password:',
    'secure_panel_forgot_password_title_sub'                => 'Enter your email to change your password:',
    'secure_panel_forgot_password_request_button_title'     => 'Request',
    'secure_panel_forgot_password_cancel_button_title'      => 'Cancel',
    'secure_panel_login_button_title'                       => 'Sign In',
    'dashboard_label'                                       => 'Dashboard',
    'visits_label'                                          => 'Visits',
    'summary_label'                                         => 'Summary',
    'user_label'                                            => 'Users',
    'events_label'                                          => 'Events',
    'errors_label'                                          => 'Errors',
    'dashboard_title'                                       => 'Dashboard ' . config('app.name'),
    'securepanel_title'                                     => 'Dashboard ' . config('app.name'),
    'dashboard_keyword'                                     => 'Dashboard ' . config('app.name'),
    'dashboard_description'                                 => 'Dashboard ' . config('app.name'),
    'tracker_visits_title'                                  => 'Visits ' . config('app.name'),
    'tracker_visits_keyword'                                => 'Visits ' . config('app.name'),
    'tracker_visits_description'                            => 'Visits ' . config('app.name'),


    /*
     * Email
     */
    'reset_password_subject'        => 'Forgot Password [' . ucfirst(config('app.name') . ']'),
    'reset_password_title'          => 'Forgot Password',
    'reset_password_title_hi'       => 'Hi',
    'reset_password_sub_one'        => 'You are receiving this email because we received a password reset request for your account.',
    'reset_password_sub_two'        => 'If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: ',
    'reset_password_sub_three'      => 'If you did not request a password reset, no further action is required.',
    'email_regards'                 => 'Regards,',
    'email_regards_name'            => config('app.name'),
    'email_facebook_title'          => "Facebook",
    'email_twitter_title'           => "Twitter",
    'email_dribbble_title'          => "Dribbble",
    'facebook_url'                  => "https://www.facebook.com/laraking",
    'twitter_url'                   => "https://twitter.com/laraking",
    'dribbble_url'                  => "https://dribbble.com/laraking",
    'email_general_question'        => "GENERAL QUESTIONS",
    'email_terms_condition'         => "TERMS & CONDITIONS",
    'email_need_help'               => "NEED HELP",
    'email_copy_rights_text'        => date('Y') . " © " . config('app.name') . ". ALL Rights Reserved.",
    'email_need_help_url'           => url('/'),
    'email_terms_condition_url'     => url('/'),
    'email_general_question_url'    => url('/'),

];


