<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Emails
    |--------------------------------------------------------------------------
    |
    | This value contains one or more emails addresses which should be sent an
    | email any time an exception occurs in production environments. You may
    | specify a single email via a string, or multiple emails via an array.
    |
    */

    'exception_emails' => null,

    /*
    |--------------------------------------------------------------------------
    | Font Awesome Style
    |--------------------------------------------------------------------------
    |
    | This value is the styling that Font Awesome icons use by default via the
    | x-ux::icon component. Using the regular or light variations requires a
    | Font Awesome Pro NPM token to be configured globally.
    |
    | Supported: "solid", "regular", "light"
    |
    */

    'font_awesome_style' => 'solid',

    /*
    |--------------------------------------------------------------------------
    | Stub Path
    |--------------------------------------------------------------------------
    |
    | This value is the path to the stubs the package should use when executing
    | various commands. To use your own stubs, make sure you vendor:publish the
    | package stubs and update this value to: resource_path('stubs/vendor/ux')
    |
    */

    'stub_path' => base_path('vendor/bastinald/ux/resources/stubs'),

];
