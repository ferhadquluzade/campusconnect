<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Add a heading/title for your plugin's settings section
    $settings->add(new admin_setting_heading(
        'auth_campusconnect/pluginheading',
        get_string('campusconnect', 'auth_campusconnect'),
        ''
    ));

    // Add the authentication lock options
    $settings->add(new admin_setting_heading(
        'auth_campusconnect/fieldlocksheader',
        get_string('auth_fieldlocks', 'auth'),
        get_string('auth_fieldlocks_help', 'auth')
    ));
    
    // The actual lock options (replaces print_auth_lock_options)
    foreach ($user_fields as $field => $name) {
        $settings->add(new admin_setting_configselect(
            "auth_campusconnect/field_lock_{$field}",
            $name,
            '',
            'unlocked',
            array(
                'unlocked'        => get_string('unlocked', 'auth'),
                'unlockedifempty' => get_string('unlockedifempty', 'auth'),
                'locked'          => get_string('locked', 'auth')
            )
        ));
    }
}
