<?php

return [
    'admin_user_info' => [
        'name' => '管理ユーザー',
        'attributes' => attr([
            'id' => 'ID',
            'avatar' => 'Avatar',
            'name' => '管理ユーザー名',
            'email_text' => 'メールアドレス<br/>(ログインID)',
            'email' => 'メールアドレス(ログインID)',
            'login_password' => 'パスワード',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード（確認）',
            'password_note_text' => '※半角英数字 6文字以上8文字以内',
            'group' => 'Group',
        ]),
    ],
    'device_info' => [
        'name' => 'Device information',
        'attributes' => attr([
            'deviceCode' => 'Device code',
            'deviceName' => 'Device name',
            'sensorInfo' => 'Sensor url',
            'sensorInfo2' => 'Sensor url 2',
            'sensorName' => 'Sensor name',
            'CCTVInfo' => ' CCTV url',
            'sensorFlag' => 'Sensor approve',
            'CCTVFlag' => ' CCTV approve',
            'cctv_username' => 'CCTV username',
            'cctv_password' => 'CCTV password',
            'SMSInfo' => 'SMS info',
            'SMSFlag' => 'Send SMS',
            'SMSType' => 'SMS Type',
            'schedule_time' => 'Schedule time',
            'lastUserCode' => 'User'
        ]),
    ],
    'alert_info' => [
        'name' => 'Alert information',
        'attributes' => attr([
            'alertCode' => 'Alert code',
            'deviceName' => 'Device name',
            'type' => 'Sensor type',
            'alert' => 'Alert',
            'alertCategory' => 'Alert category',
            'alertStatus' => 'Alert status',
            'alertType' => 'Alert type',
            'alertDatetime' => 'Alert datetime',
            'deviceCode' => 'Device name',
            'alertDate' => 'Alert datetime',
            'month' => 'Month',
            'year' => 'Year',
        ]),
    ],
];
