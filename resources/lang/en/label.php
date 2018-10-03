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
    'secure_panel_forgot_password_title_sub'                => 'Enter your email to reset your password:',
    'secure_panel_forgot_password_request_button_title'     => 'Request',
    'secure_panel_forgot_password_cancel_button_title'      => 'Cancel',
    'secure_panel_login_button_title'                       => 'Sign In',

    /*
     * Email
     */
    'reset_password_subject' => 'Reset Password' . ucfirst(config('app.name'))

];


