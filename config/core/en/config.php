<?php
return [
    // form
    'default_option' => ['' => 'Please select'],
    'user' => [
        // user auth type
        'auth_types' => array(
            0 => 'Admin',
            1 => 'Mod',
            2 => 'Viewer',
        ),

        // user group
        'groups' => array(
            1 => 'A',
            2 => 'B',
            3 => 'C',
        ),
    ],
    'device' => [
        'sensor_approve' => [
            1 => 'Yes',
            0 => 'No',
        ],
        'cctv_approve' => [
            1 => 'Yes',
            0 => 'No',
        ],
        'sms_approve' => [
            1 => 'Yes',
            0 => 'No',
        ],
    ],

    // Crawler - Sensor name
    'crawler_ssname' => array(
        'temperature' => 'Ext. Temp1',
        'Humidity' => 'Humidity1',
        'Dew_Point' => 'Dew Point1',
        'Power_Fail' => 'PowerFail1',
        'Leak_Sensor' => 'Flooding1',
        'Security_Probe' => 'Security1',
    ),
    
    // Color chart - Dashboard
    'color_chart' => [
        'normal' => '#00a65a', // green
        'warning' => '#f9be00', // yellow
        'danger' => '#f50600', // red
        'down' => '#f50600',
    ], 

    // Sensor status range
    'sensor_status_range' => [
        'temp' => [
            'warning' => [
                'bot' => 18,
                'top' => 25,
            ],
            'downing' => [
                'bot' => 15,
                'top' => 29,
            ],
        ],
        'humidity' => [
            'warning' => [
                'bot' => 45,
                'top' => 65,
            ],
            'downing' => [
                'bot' => 40,
                'top' => 70,
            ],
        ],
        'dew_point' => [
            'warning' => [
                'bot' => 18,
                'top' => 25,
            ],
            'downing' => [
                'bot' => 15,
                'top' => 29,
            ],
        ],
    ],
    'months' => [
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    ],
    'schedules' => [30, 60, 90],
];
