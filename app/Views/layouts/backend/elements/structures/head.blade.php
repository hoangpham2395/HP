<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <meta name="description" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/favicon.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $cssFiles = [
        'vendor/bootstrap',
        'vendor/font-awesome.min',
        'vendor/ionicons.min',
        'vendor/AdminLTE.min',
        'vendor/skins/_all-skins',
        'vendor/all',
        'vendor/blue',
        'vendor/data_table',
        'vendor/bootstrap-toggle.min',
        'style',
        'custom',
    ];
    $jsFiles = [
        'vendor/jquery.min',
    ];
    ?>
    {!! loadFiles($jsFiles, $area, 'js') !!}
    {!! loadFiles($cssFiles, $area) !!}
    @include('layouts.elements.head_autoload')
    <!--[if lt IE 9]>
    {{Html::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}
    {{Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}
    <![endif]-->
</head>