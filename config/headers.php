<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Headers :: Laravel Security Middleware
    |--------------------------------------------------------------------------
    |
    |
    | 
    | Server: "apache", "nginx"
    |
    */

    'remove' => [
        'X-Powered-By',
        'Server',
        'server'
    ],
    
    'set-headers' => [
        'Referrer-Policy' => 'no-referrer-when-downgrade',
        'X-Powered-By' => 'PHP/7.4.0',
        'Server' => 'nginx',        
        'server' => 'nginx',        
        'Strict-Transport-Security' => 'max-age=86400; includeSubDomains',        
    ],

    /*
    /
    / 
    / 'max-age=86400; includeSubDomains; preload'
    / preload => difficult to undo
    */
    'Content-Security-Policy' =>'',

    'strict-transport-security' => 'max-age=86400; includeSubDomains',

    'certificate-transparency' => '',

    'permissions-policy' => '',

];
