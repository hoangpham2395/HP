<?php
return [
    // form
    'default_option' => ['' => '選択してください'],
    'user' => [
        // user auth type
        'auth_types' => array(
            0 => 'マスター権限',
            1 => '本部権限',
            2 => '営業権限',
        ),

        // user group
        'groups' => array(
            1 => 'Aグループ',
            2 => 'Bグループ',
            3 => 'Cグループ',
        ),
    ],
    // another
    // file info
    'file' => array(
        'default' => [
            'image' => [
                'ext' => array('jpeg', 'jpg', 'png', 'gif')
            ]
        ],
        'admin' => [
            'avatar' => array(
                'size' => ['min' => 0.01, 'max' => 2], // MB
                'ext' => array('jpeg', 'jpg', 'png', 'gif')
            )
        ]
    ),
    'csv' => [
        'export' => [
            'admin' => [
                'filename_prefix' => 'Admin',
                'header' =>
                    [
                        'id' => 'ID',
                        'email' => 'Email',
                        'avatar' => 'Avatar',
                        'ins_date' => 'Created at',
                        'upd_date' => 'Updated at',
                    ],
            ]
        ]
    ],

    // Crawler - Sensor name
    'crawler_ssname' => array(
        'temperature' => ['Ext. Temp1', 'Ext. Temp2'],
        'Humidity' => ['Humidity1', 'Humidity2'],
        'Dew_Point' => ['Dew Point1', 'Dew Point2'],
        'Power_Fail' => ['PowerFail1','PowerFail2'],
        'Leak_Sensor' => ['Flooding1', 'Flooding2'],
        'Security_Probe' => ['Security1', 'Security2'],
    ),
    // Crawler - Sensor name2
    'crawler_ssname2' => array(
        'temperature' => 'Ext. Temp',
        'Humidity' => 'Humidity',
        'Dew_Point' => 'Dew Point',
        'Power_Fail' => 'PowerFail',
        'Leak_Sensor' => 'Flooding',
        'Security_Probe' => 'Security',
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
];
