<?php

return [
    /*
     * Front End
     */
    'backend_login_title' => "Welcome to laraking backend.",
    'backend_login_description' => "Premium Laraking Admin Panel.",
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
    'users_label'                                           => 'Users',
    'errors_label'                                          => 'Errors',
    'back_label'                                            => 'Back',
    'submit_label'                                          => 'Submit',
    'dashboard_title'                                       => 'Dashboard',
    'securepanel_title'                                     => 'Dashboard ' . config('app.name'),
    'dashboard_keyword'                                     => 'Dashboard ' . config('app.name'),
    'dashboard_description'                                 => 'Dashboard ' . config('app.name'),
    'tracker_visits_title'                                  => 'Visits ' . config('app.name'),
    'tracker_visits_keyword'                                => 'Visits ' . config('app.name'),
    'tracker_visits_description'                            => 'Visits ' . config('app.name'),
    'tracker_summary_title'                                 => 'Summary ' . config('app.name'),
    'tracker_summary_keyword'                               => 'Summary ' . config('app.name'),
    'tracker_summary_description'                           => 'Summary ' . config('app.name'),
    'tracker_users_title'                                   => 'Users ' . config('app.name'),
    'tracker_users_keyword'                                 => 'Users ' . config('app.name'),
    'tracker_users_description'                             => 'Users ' . config('app.name'),
    'tracker_errors_title'                                  => 'Errors ' . config('app.name'),
    'tracker_errors_keyword'                                => 'Errors ' . config('app.name'),
    'tracker_errors_description'                            => 'Errors ' . config('app.name'),

    /*
     * Roles module
     */
    'roles_title'                                           => 'Roles',
    'roles_title_listing'                                   => 'Roles Listing',
    'roles_keyword'                                         => 'Roles ' . config('app.name'),
    'roles_description'                                     => 'Roles ' . config('app.name'),
    'roles_add_title'                                       => 'Add new role',
    'roles_add_keyword'                                     => 'Add new role',
    'roles_add_description'                                 => 'Add new role',
    'roles_edit_title'                                      => 'Edit role',
    'roles_edit_keyword'                                    => 'Edit role',
    'roles_edit_description'                                => 'Edit role',

    /*
     * Tracker
     */
    'visits_title_listing'                                  => 'Visits Listing',
    'summary_title_listing'                                 => 'Summary Listing',
    'users_title_listing'                                   => 'Users Listing',
    'error_title_listing'                                   => 'Error Listing',

    /*
     * Permission module
     */
    'permission_title'                                       => 'Permission',
    'permission_keyword'                                     => 'Permission ' . config('app.name'),
    'permission_description'                                 => 'Permission ' . config('app.name'),
    'permission_title_listing'                               => 'Permission Listing',
    'permission_assign_title'                                => 'Assign permission',

    /*
     * Dashboard
     */
    'dashboard_user_views_title'                             => 'User Views',
    'dashboard_user_registered_views_title'                  => 'Registered User',
    'dashboard_user_views_description'                       => 'Month wise user views display',
    'dashboard_user_registered_views_description'            => 'Month wise registered user display',


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

    /*
     * Field name roles
     */
    'no_title'                      => 'No',
    'role_name_field_title'         => 'Role',
    'role_name_field_note'          => 'Specify unique role name like [admin,user,etc...]',
    'created_date_field_title'      => 'Created Date',
    'action_field_title'            => 'Action',

    'visits_ip_field_title'                 => 'IP',
    'visits_country_field_title'            => 'Country/City',
    'visits_user_field_title'               => 'User',
    'visits_device_field_title'             => 'Device',
    'visits_browser_field_title'            => 'Browser',
    'visits_url_field_title'                => 'URL',
    'visits_page_views_field_title'         => 'Page Views',
    'visits_created_date_field_title'       => 'Visited Date',
    'users_last_activity_date_field_title'  => 'Last Activity Date',
    'users_email_field_title'               => 'Email',
    'error_code_field_title'                => 'Error Code',
    'error_message_field_title'             => 'Error Message',

    /*
     * Error Message
     */

    // Roles
    'role_field_required_error_msg' => "Invalid role name. Please try again.",
    'role_insert_success_msg'       => "New role created successfully.",
    'role_update_success_msg'       => "Role updated successfully.",
    'role_delete_success_msg'       => "Role deleted successfully.",
    'role_insert_error_msg'         => "Something wen't wrong, new role not updated. Please try again.",
    'role_update_error_msg'         => "Something wen't wrong, role not updated. Please try again.",
    'role_delete_error_msg'         => "Something wen't wrong, role not delete. Please try again.",
    'role_found_error_msg'          => "Something wen't wrong, role not found. Please try again.",

];


