{!! isset($statics['js']) ? loadFiles($statics['js'], $area, 'js') : null !!}
@if (isset($controllerName) && !empty($controllerName) && file_exists(public_path('js' . DIRECTORY_SEPARATOR . $area . DIRECTORY_SEPARATOR  . (getSystemConfig('use_webpack')?'webpack':'autoload') . DIRECTORY_SEPARATOR . $controllerName . '.js')))
    {{Html::script(buildVersion(public_url('js' . DIRECTORY_SEPARATOR . $area . DIRECTORY_SEPARATOR  . (getSystemConfig('use_webpack')?'webpack':'autoload') . DIRECTORY_SEPARATOR . $controllerName . '.js')))}}
@endif