<?php
if (App::runningInConsole()) {
    return false;
}
//$breadcrumbs = array(
//    [
//        'type' => 'index',
//        'name' => 'services.main',
//        'screen' => 'services',
//        'icon' => '<i class="fa fa-dashboard"></i>',
//        'params' => [],
//        'allow_link' => true,
//        'childs' => [
//            [
//                'type' => 'index',
//                'name' => 'dashboard.index',
//                'screen' => 'dashboard',
//            ],
//            [
//                'type' => 'index',
//                'name' => 'devices.dashboard',
//                'screen' => 'devices',
//                'icon' => '',
//                'childs' =>[
//                    [
//                        'type' => 'index',
//                        'name' => 'devices.report',
//                        'screen' => 'devices',
//                        'text' => 'viewData.device_name',
//                    ],
//                ],
//            ],
//            [
//                'type' => 'index',
//                'name' => 'alert.index',
//                'screen' => 'alert',
//            ],
//            [
//                'type' => 'index',
//                'name' => 'cctv.cctvTotal',
//                'screen' => 'cctv',
//                'childs' => [
//                    [
//                        'type' => 'index',
//                        //'name' => 'cctv.report',
//                        'screen' => 'cctv',
//                    ],
//                ],
//            ],
//        ]
//    ],
//    [
//        'type' => 'index',
//        'name' => 'settings.main',
//        'screen' => 'settings',
//        'icon' => '<i class="fa fa-cog"></i>',
//        'params' => [],
//        'allow_link' => true,
//        'childs' => [
//            [
//                'type' => 'index',
//                'name' => 'devices.index',
//                'screen' => 'devices',
//            ],
//            [
//                'type' => 'index',
//                'name' => 'admin.index',
//                'screen' => 'admin',
//            ],
//            [
//                'type' => 'index',
//                'name' => 'settings.index',
//                'screen' => 'settings',
//                'text' => 'System'
//            ],
//        ]
//    ],
//);
breadcrumb_register($breadcrumbs);
