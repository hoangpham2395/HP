<?php
function buildDashBoardUrl()
{
    return route('admin.index');
}

function buildDashBoardParamsDefault()
{
    return [];
}

function getActiveMenuClass($need)
{
    return getViewData('routeName') == $need ? 'active ' : '';
}

function getScheduleTimeRange()
{
    $key = getConstant('SCHEDULE_TIME');
    $r = getConfigDB($key, getConfig('schedules'));
    if (!is_array($r)) {
        $r = explode(',', $r);
    }
    $result = [];
    foreach ($r as $value) {
        $result[$value] = $value;
    }
    return $result;
}

function getConfigDB($key, $value = null)
{
    if (empty($key)) {
        return $value;
    }
    $r = \App\Model\Entities\Setting::where('key', $key)->first();
    if (empty($r)) {
        return $value;
    }
    return $r->value;
}