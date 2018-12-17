<?php

use App\Helpers\Url;
use Carbon\Carbon;

if (!function_exists('getConstant')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function getConstant($key, $default = null)
    {
        return config('constant.' . $key, $default);
    }
}
if (!function_exists('getConfig')) {

    /**
     * @param $key
     * @param null $default
     * @param $flip
     * @return mixed
     */
    function getConfig($key, $default = null, $flip = false)
    {
        $dir = 'core.' . getCurrentLangCode() . '.config.';
        if (app('config')->has($dir . $key)) {
            $r = config($dir . $key, $default);
        } else {
            $r = config('core.' . config('app.fallback_locale.' . getCurrentArea(), 'ja') . '.config.' . $key, $default);
        }
        return is_array($r) && $flip ? array_flip($r) : $r;
    }
}
if (!function_exists('getKeysConfig')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function getKeysConfig($key, $default = null)
    {
        return array_keys(getConfig($key, $default));
    }
}
if (!function_exists('getEventName')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function getEventName($key, $default = null)
    {
        return config('events.' . $key, $default);
    }
}
if (!function_exists('getSystemConfig')) {

    /**
     * @param $key
     * @param null $default
     * @param $flip
     * @return mixed
     */
    function getSystemConfig($key, $default = null, $flip = false)
    {
        return config('system.' . $key, $default, $flip);
    }
}
if (!function_exists('getTmpUploadDir')) {

    /**
     * @param $file
     * @return mixed
     */
    function getTmpUploadDir($file = null)
    {
        return getSystemConfig('tmp_upload_dir', 'tmp_upload') . DIRECTORY_SEPARATOR . $file;
    }
}

if (!function_exists('getTmpUploadUrl')) {

    /**
     * @param $file
     * @return mixed
     */
    function getTmpUploadUrl($file = null)
    {
        return asset(getTmpUploadDir($file));
    }
}
if (!function_exists('getTmpUploadPath')) {

    /**
     * @param $file
     * @return mixed
     */
    function getTmpUploadPath($file = null)
    {
        return public_path(getTmpUploadDir($file));
    }
}

if (!function_exists('getMediaDir')) {

    /**
     * @param $file
     * @return mixed
     */
    function getMediaDir($file = null)
    {
        return getSystemConfig('media_dir', 'media') . DIRECTORY_SEPARATOR . $file;
    }
}
if (!function_exists('getMediaUrl')) {

    /**
     * @param $file
     * @return mixed
     */
    function getMediaUrl($file = null)
    {
        return asset(getMediaDir($file));
    }
}
if (!function_exists('getMediaPath')) {

    /**
     * @param $file
     * @return mixed
     */
    function getMediaPath($file = null)
    {
        return public_path(getMediaDir($file));
    }
}
if (!function_exists('getTextValue')) {

    /**
     * @param $key
     * @param $value
     * @param null $default
     * @param $flip
     * @return mixed
     */
    function getTextValue($key, $value = null, $default = null, $flip = false)
    {
        $r = getConfig($key, $default, $flip);
        return array_get($r, $value);
    }
}

// route
if (!function_exists('getBackendAlias')) {

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    function getBackendAlias($key = 'backend_alias', $default = 'admin')
    {
        return getSystemConfig($key, $default);
    }
}


if (!function_exists('getBackendDomain')) {

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    function getBackendDomain($key = 'backend_domain', $default = '')
    {
        return getSystemConfig($key, $default);
    }
}

if (!function_exists('getFrontendAlias')) {

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    function getFrontendAlias($key = 'frontend_alias', $default = '/')
    {
        return getSystemConfig($key, $default);
    }
}


if (!function_exists('getFrontendDomain')) {

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    function getFrontendDomain($key = 'frontend_domain', $default = '')
    {
        return getSystemConfig($key, $default);
    }
}


if (!function_exists('getApiAlias')) {

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    function getApiAlias($key = 'api_alias', $default = 'api')
    {
        return getSystemConfig($key, $default);
    }
}

if (!function_exists('getApiDomain')) {

    /**
     * @param string $key
     * @param string $default
     * @return mixed
     */
    function getApiDomain($key = 'api_domain', $default = '')
    {
        return getSystemConfig($key, $default);
    }
}

if (!function_exists('backUrl')) {

    /**
     * @param $url
     * @param $default
     * @param array $paramsDefault
     * @param array $params
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function backUrl($url, $params = array(), $default = '', $paramsDefault = [])
    {
        return Url::backUrl($url, $params, $default, $paramsDefault);
    }
}

if (!function_exists('keepBack')) {

    /**
     * @return string
     */
    function keepBack()
    {
        return Url::keepBackUrl();
    }
}


if (!function_exists('getBackUrl')) {

    /**
     * @param bool $fromConfirm
     * @return mixed|string
     */
    function getBackUrl($fromConfirm = false)
    {
        return $fromConfirm ? Url::getOldUrl() : Url::getBackUrl();
    }
}
if (!function_exists('getBackParams')) {

    /**
     * @return mixed
     */
    function getBackParams()
    {
        return Input::get(Url::QUERY);
    }
}

//entity
if (!function_exists('attr')) {

    /**
     * @param array $attrs
     * @return array
     */
    function attr($attrs = array())
    {
        return array_merge(config('entity.attributes', []), $attrs);
    }
}
// trans
if (!function_exists('transm')) {

    /**
     * @param null $id
     * @param array $replace
     * @param null $locale
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    function transm($id = null, $replace = [], $locale = null)
    {
        return trans('models.' . $id, $replace, $locale);
    }
}

if (!function_exists('transa')) {

    /**
     * @param $modelName
     * @param null $id
     * @param array $replace
     * @param null $locale
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    function transa($modelName, $id = null, $replace = [], $locale = null)
    {
        return transm($modelName . '.attributes.' . $id, $replace, $locale);
    }
}

if (!function_exists('transb')) {

    /**
     * @param null $id
     * @param array $replace
     * @param null $locale
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    function transb($id = null, $replace = [], $locale = null)
    {
        $label = '';
        $idx = explode('.', $id);
        switch ($idx[1]) {
            case 'index':
                $label = trans('actions.index');
                break;
            case 'show':
                $label = trans('actions.show');
                break;
            case 'edit':
            case 'edit_confirm':
                $label = trans('actions.edit');
                break;
            case 'create':
            case 'create_confirm':
                $label = trans('actions.create');
                break;
        }
        $check = app('translator')->has('breadcrumbs.' . $id, $replace, $locale, false);
        if (!$check) {
            $id = str_replace($idx['1'], 'name', $id);
            return trans('breadcrumbs.' . $id, $replace, $locale) . $label;
        }
        return trans('breadcrumbs.' . $id, $replace, $locale);
    }
}

if (!function_exists('tf')) {

    /**
     * translate frontend
     * @param null $id
     * @param array $replace
     * @param null $locale
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    function tf($id = null, $replace = [], $locale = null)
    {
        return transWithEditor('frontend.' . $id, $replace, $locale);
    }
}

if (!function_exists('tb')) {

    /**
     * translate frontend
     * @param null $id
     * @param array $replace
     * @param null $locale
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    function tb($id = null, $replace = [], $locale = null)
    {
        return transWithEditor('backend.' . $id, $replace, $locale);
    }
}

if (!function_exists('transWithEditor')) {

    /**
     * translate frontend
     * @param null $id
     * @param array $replace
     * @param null $locale
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    function transWithEditor($id = null, $replace = [], $locale = null)
    {
        $r = trans($id, $replace, $locale);
        return getSystemConfig('trans_with_editor') ? '<span class="trans-with-editor" data-source="' . $id . '">' . $r . '</span>' : $r;
    }
}

// pagination
if (!function_exists('paginate')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function paginate($key, $default = null)
    {
        return config('pagination.' . $key, $default);
    }
}

if (!function_exists('backendPaginate')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function backendPaginate($key, $default = null)
    {
        return paginate('backend.' . $key, $default);
    }
}

if (!function_exists('frontendPaginate')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function frontendPaginate($key, $default = null)
    {
        return paginate('frontend.' . $key, $default);
    }
}

if (!function_exists('apiPaginate')) {

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function apiPaginate($key, $default = null)
    {
        return paginate('api.' . $key, $default);
    }
}
// guard
if (!function_exists('backendGuard')) {

    /**
     * @param string $default
     * @return mixed
     */
    function backendGuard($default = 'admins')
    {
        return Auth::guard(getSystemConfig('backend_guard', $default));
    }
}
if (!function_exists('frontendGuard')) {

    /**
     * @param string $default
     * @return mixed
     */
    function frontendGuard($default = 'frontend')
    {
        return Auth::guard(getSystemConfig('frontend_guard', $default));
    }
}
if (!function_exists('apiGuard')) {

    /**
     * @param string $default
     * @return mixed
     */
    function apiGuard($default = 'api')
    {
        return Auth::guard(getSystemConfig('api_guard', $default));
    }
}
if (!function_exists('getCurrentUserId')) {

    /**
     * @param string $default
     * @return mixed
     */
    function getCurrentUserId($default = 0)
    {
        try {
            if (\App::runningInConsole()) {
                return getSystemConfig('default_auth_id', $default);
            }
            if (backendGuard()->user()) {
                return backendGuard()->user()->getKey();
            }
            if (frontendGuard()->user()) {
                return frontendGuard()->user()->getKey();
            }
            if (apiGuard()->user()) {
                return apiGuard()->user()->getKey();
            }
        } catch (\Exception $e) {

        }
        return $default;
    }
}
if (!function_exists('getCurrentLangCode')) {

    /**
     * @param string $default
     * @return mixed
     */
    function getCurrentLangCode($default = 'ja')
    {
        try {
            $lang = \Illuminate\Support\Facades\Session::get(getLocaleKey(), config('app.locale.' . getCurrentArea(), $default));
            return $lang;
        } catch (\Exception $e) {

        } catch (\Error $error) {

        }
        return config('app.locale.' . getCurrentArea(), $default);
    }
}

function getLocaleKey()
{
    return isBackend() ? 'locale_backend' : 'locale_frontend';
}

// utils
if (!function_exists('toUnderScore')) {

    /**
     * @param $string
     * @return string
     */
    function toUnderScore($string)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }
}

if (!function_exists('toCameCase')) {

    /**
     * @param $string
     * @return string
     */
    function toCameCase($string)
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
    }
}

if (!function_exists('isMulti')) {

    /**
     * @param $array
     * @return bool
     */
    function isMulti($array)
    {
        return (count($array) != count($array, 1));
    }
}
//log
if (!function_exists('logInfo')) {

    /**
     * @param $message
     * @param array $context
     */
    function logInfo($message, array $context = [])
    {
        ChannelLog::info('info', $message, $context);
    }
}
if (!function_exists('logError')) {

    /**
     * @param $message
     * @param array $context
     */
    function logError($message, array $context = [])
    {
        try {
            ChannelLog::error('error', $message, $context);
        } catch (\Exception $e) {

        }
    }
}
if (!function_exists('logDebug')) {

    /**
     * @param $message
     * @param array $context
     */
    function logDebug($message, array $context = [])
    {
        ChannelLog::debug('debug', $message, $context);
    }
}
if (!function_exists('logApi')) {

    /**
     * @param $message
     * @param array $context
     */
    function logApi($message, array $context = [])
    {
        ChannelLog::info('api', $message, $context);
    }
}
if (!function_exists('logWarn')) {

    /**
     * @param $message
     * @param array $context
     */
    function logWarn($message, array $context = [])
    {
        ChannelLog::warning('warn', $message, $context);
    }
}
//breadcrumbs
if (!function_exists('breadcrumbConfirm')) {

    /**
     * @param $breadcrumbs
     * @param $screen
     * @param $subParent
     * @param $params
     * @return mixed
     */
    function breadcrumbConfirm($breadcrumbs, $screen, $subParent = false, $params = [])
    {
        $parent = $subParent ? 'create' : 'index';
        if (Input::has('id')) {
            $parent = $subParent ? 'edit' : $parent;
            $breadcrumbs->parent($screen . '.' . $parent);
            return breadcrumbPush($breadcrumbs, transb($screen . '.edit_confirm'), '', $params);

        }
        $breadcrumbs->parent($screen . '.' . $parent);
        breadcrumbPush($breadcrumbs, transb($screen . '.create_confirm'), '', $params);
    }
}
if (!function_exists('breadcrumbCreate')) {

    /**
     * @param $breadcrumbs
     * @param $screen
     * @param $params = []
     */
    function breadcrumbCreate($breadcrumbs, $screen, $params = [])
    {
        $breadcrumbs->parent($screen . '.index');
        $route = $screen . '.create';
        breadcrumbPush($breadcrumbs, transb($route), route($route), $params);
    }
}

if (!function_exists('breadcrumbEdit')) {

    /**
     * @param $breadcrumbs
     * @param $screen
     * @param $params
     */
    function breadcrumbEdit($breadcrumbs, $screen, $params = [])
    {
        $breadcrumbs->parent($screen . '.index');
        $route = $screen . '.edit';
        breadcrumbPush($breadcrumbs, transb($route), route($route, \Illuminate\Support\Facades\Input::get('id', 0)), $params);
    }
}

if (!function_exists('breadcrumbShow')) {

    /**
     * @param $breadcrumbs
     * @param $screen
     * @param $params
     */
    function breadcrumbShow($breadcrumbs, $screen, $params = [])
    {
        $breadcrumbs->parent($screen . '.index');
        $route = $screen . '.show';
        breadcrumbPush($breadcrumbs, transb($route), '', $params);
    }
}
if (!function_exists('breadcrumbIndex')) {

    /**
     * @param $breadcrumbs
     * @param $screen
     * @param null $parent
     * @param $allowLink
     * @param $params
     * @param $params2
     */
    function breadcrumbIndex($breadcrumbs, $screen, $parent = null, $allowLink = true, $params = [])
    {
        $route = $screen . '.index';
        $parent ? $breadcrumbs->parent($parent) : null;
        breadcrumbPush($breadcrumbs, transb($route), $allowLink ? route($route, array_get($params, 'params')) : null, $params);
    }
}

if (!function_exists('breadcrumbPush')) {

    function breadcrumbPush($breadcrumbs, $text, $link, $params = [])
    {
        $text = array_get($params, 'text', $text);
        return $breadcrumbs->push($text, $link, $params);
    }
}


// migrate
if (!function_exists('getUpdatedAtColumn')) {

    function getUpdatedAtColumn($key = 'field')
    {
        return getSystemConfig('updated_at_column.' . $key);
    }
}
if (!function_exists('getCreatedAtColumn')) {

    function getCreatedAtColumn($key = 'field')
    {
        return getSystemConfig('created_at_column.' . $key);
    }
}
if (!function_exists('getDeletedAtColumn')) {

    function getDeletedAtColumn($key = 'field')
    {
        return getSystemConfig('deleted_at_column.' . $key, '');
    }
}

if (!function_exists('getDelFlagColumn')) {

    function getDelFlagColumn($key = 'field')
    {
        return getSystemConfig('del_flag_column.' . $key);
    }
}

if (!function_exists('getCreatedByColumn')) {

    function getCreatedByColumn($key = 'field')
    {
        return getSystemConfig('created_by_column.' . $key);
    }
}

if (!function_exists('getUpdatedByColumn')) {

    function getUpdatedByColumn($key = 'field')
    {
        return getSystemConfig('updated_by_column.' . $key);
    }
}

if (!function_exists('getDeletedByColumn')) {

    function getDeletedByColumn($key = 'field')
    {
        return getSystemConfig('deleted_by_column.' . $key, getUpdatedByColumn());
    }
}

if (!function_exists('getStatusColumn')) {

    function getStatusColumn($key = 'field')
    {
        return getSystemConfig('status_column.' . $key);
    }
}

// password
if (!function_exists('genPassword')) {

    function genPassword($value)
    {
        if ($value && Hash::needsRehash($value)) {
            return Hash::make($value);
        }
        return $value;
    }
}

if (!function_exists('isCollection')) {

    function isCollection($value)
    {
        return $value instanceof Illuminate\Support\Collection || $value instanceof Illuminate\Database\Eloquent\Collection;
    }
}

if (!function_exists('format')) {

    function format($date, $format = 'Y-m-d H:i:s')
    {
        try {
            if (!$date) {
                return $date;
            }
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        } catch (\Exception $e) {
            $date = date($format, strtotime($date));
        }
        return $date;
    }

}
if (!function_exists('formatPhone')) {

    function formatPhone($phone, $format = '$1-$2-$3')
    {
        $phone = preg_replace("/[^0-9]/", "", $phone);
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{3,6})/", $format, $phone);
    }

}
if (!function_exists('formatZipCode')) {

    function formatZipCode($value, $format = '$1-$2')
    {
        $value = preg_replace("/[^0-9]/", "", $value);
        return preg_replace("/([0-9]{3})([0-9]{1,7})/", $format, $value);
    }

}

if (!function_exists('buildVersion')) {

    function buildVersion($file)
    {
        return $file . '?v=' . getSystemConfig('static_version');

    }
}

if (!function_exists('loadFile')) {

    function loadFiles($files, $area, $type = 'css')
    {
        if (empty($files)) {
            return '';
        }
        $result = '';
        foreach ($files as $item) {
            $filePath = $type . DIRECTORY_SEPARATOR . $area . DIRECTORY_SEPARATOR . $item . '.' . $type;
            if (!file_exists(public_path($filePath))) {
                continue;
            }
            $result .= $type == 'css' ? Html::style(buildVersion(public_url($filePath))) : Html::script(buildVersion(public_url($filePath)));
        }
        return $result;
    }
}

if (!function_exists('setLang')) {

    function setLang($lang = '')
    {
        $lang = $lang ? $lang : getCurrentLangCode();
        \App::setLocale($lang);
        \Illuminate\Support\Facades\Session::put(getLocaleKey(), $lang);
    }
}

if (!function_exists('array_filter_null')) {

    function array_filter_null($array)
    {
        foreach ($array as $key => $value) {
            if ($value === null || $value === '') {
                unset($array[$key]);
            }
        }
        return $array;
    }
}


if (!function_exists('toPhoneNumber')) {

    /**
     * @param $phone
     * @return mixed
     */
    function toPhoneNumber($phone)
    {
        return preg_replace(array('*-*', '*\s*', '*\(*', '*\)*'), '', $phone);
    }
}

if (!function_exists('getModelAttributes')) {

    /**
     * @param $alias
     * @return mixed
     */
    function getModelAttributes($alias)
    {
        return \Illuminate\Support\Facades\Lang::get('models.' . $alias . '.attributes');
    }
}

if (!function_exists('getModelCustomAttributes')) {

    /**
     * @param $alias
     * @return mixed
     */
    function getModelCustomAttributes($alias)
    {
        return \Illuminate\Support\Facades\Lang::get('models.' . $alias . '.custom_attributes');
    }
}
if (!function_exists('getModelAttribute')) {

    /**
     * @param $model
     * @param $attr
     * @return mixed
     */
    function getModelAttribute($model, $attr)
    {
        return \Illuminate\Support\Facades\Lang::get('models.' . $model . '.attributes.' . $attr);
    }
}
if (!function_exists('numberFormat')) {

    function numberFormat($number)
    {
        return !is_numeric($number) || empty($number) || '0' === (string)$number ? $number : number_format($number, 0, '.', ',');
    }
}
if (!function_exists('ebr')) {

    function ebr($html, $showWhiteSpace = false)
    {
        $string = nl2br(e($html));
        if (!$showWhiteSpace) {
            return $string;
        }
        $string = str_replace(' ', '&nbsp;', $string);
        return str_replace('　', '&nbsp;', $string);
    }
}
if (!function_exists('getAge')) {

    function getAge($birthday)
    {
        try {
            $birthday = Carbon::parse($birthday)->format('Y-m-d');
            list($year, $month, $day) = explode("-", $birthday);
            $yearDiff = date("Y") - $year;
            $monthDiff = date("m") - $month;
            $dayDiff = date("d") - $day;
            if ($monthDiff < 0) {
                $yearDiff--;
            } else if (($monthDiff == 0) && ($dayDiff < 0)) {
                $yearDiff--;
            }
            return $yearDiff;
        } catch (\Exception $exception) {

        }
        return 0;
    }
}
if (!function_exists('vietnameseToLatin')) {

    function vietnameseToLatin($string, $slug = '-')
    {
        $vietnamese = ["à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ", "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ", "Ì", "Í", "Ị", "Ỉ", "Ĩ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Đ"];

        $latin = ["a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "I", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "Y", "Y", "Y", "Y", "Y", "D"];

        $string = trim(str_replace($vietnamese, $latin, $string));
        $string = strtolower(str_replace(' ', $slug, $string));
        return preg_replace('/[^A-Za-z0-9\-\']/', '', $string);
    }
}
if (!function_exists('is_multi_array')) {

    function is_multi_array($arr)
    {
        rsort($arr);
        return isset($arr[0]) && is_array($arr[0]);
    }
}
if (!function_exists('sql_binding')) {

    function sql_binding($sql, $bindings)
    {
        $boundSql = str_replace(['%', '?'], ['%%', '%s'], $sql);
        foreach ($bindings as &$binding) {
            if ($binding instanceof \DateTime) {
                $binding = $binding->format('\'Y-m-d H:i:s\'');
            } elseif (is_string($binding)) {
                $binding = "'$binding'";
            }
        }
        $boundSql = vsprintf($boundSql, $bindings);
        return $boundSql;
    }
}
if (!function_exists('toSql')) {

    function toSql($query)
    {
        return sql_binding($query->toSql(), $query->getBindings());
    }
}
if (!function_exists('mysql_escape')) {
    function mysql_escape($inp)
    {
        if (is_array($inp)) return array_map(__METHOD__, $inp);

        if (!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }
}
if (!function_exists('breadcrumb_register')) {
    function breadcrumb_register($breadcrumbs, $parent = '', $reject = [])
    {
        foreach ($breadcrumbs as $breadcrumb) {
            if (in_array($breadcrumb['type'], $reject)) {
                continue;
            }
            if ($breadcrumb['type'] == 'resource') {
                build_resource_breadcrumbs($breadcrumb, $parent);
                continue;
            }
            $name = isset($breadcrumb['name']) ? $breadcrumb['name'] : $breadcrumb['screen'] . '.' . $breadcrumb['type'];
            call_user_func_array('Breadcrumbs::register', [$name, function ($bd) use ($breadcrumb, $parent) {
                $type = $breadcrumb['type'];
                switch ($type) {
                    case 'index' :
                        breadcrumbIndex($bd, $breadcrumb['screen'], $parent, isset($breadcrumb['allow_link']) ? $breadcrumb['allow_link'] : true, $breadcrumb);
                        break;
                    case 'edit' :
                        breadcrumbEdit($bd, $breadcrumb['screen'], $breadcrumb);
                        break;
                    case 'show' :
                        breadcrumbShow($bd, $breadcrumb['screen'], $breadcrumb);
                        break;
                    case 'create' :
                        breadcrumbCreate($bd, $breadcrumb['screen'], $breadcrumb);
                        break;
                    case 'confirm' :
                        breadcrumbConfirm($bd, $breadcrumb['screen'], $breadcrumb);
                        break;
                }
            }]);
            if (isset($breadcrumb['childs'])) {
                breadcrumb_register($breadcrumb['childs'], $name);
            }
        }
    }
}
function build_resource_breadcrumbs($breadcrumb, $parent)
{
    if (array_get($breadcrumb, 'only', [])) {
        $newBreadcrumbs = [];
        foreach (array_get($breadcrumb, 'only', []) as $type) {
            $newBreadcrumbs[] = [
                'type' => $type,
                'screen' => $breadcrumb['screen'],
            ];
        }
    } else {
        $newBreadcrumbs = [
            [
                'type' => 'index',
                'screen' => $breadcrumb['screen'],
            ],
            [
                'type' => 'show',
                'screen' => $breadcrumb['screen'],
            ],
            [
                'type' => 'edit',
                'screen' => $breadcrumb['screen'],
            ],
            [
                'type' => 'create',
                'screen' => $breadcrumb['screen'],
            ],
            [
                'type' => 'confirm',
                'screen' => $breadcrumb['screen'],
            ],
        ];
    }
    breadcrumb_register($newBreadcrumbs, $parent, array_get($breadcrumb, 'reject', []));
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('isIndex')) {
    function isIndex()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'index';
    }
}
if (!function_exists('isDestroy')) {
    function isDestroy()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'destroy';
    }
}
if (!function_exists('isMassDestroy')) {
    function isMassDestroy()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'massDestroy';
    }
}
if (!function_exists('isCreate')) {
    function isCreate()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'create';
    }
}
if (!function_exists('isShow')) {
    function isShow()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'show';
    }
}
if (!function_exists('isEdit')) {
    function isEdit()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'edit';
    }
}
if (!function_exists('isValid')) {
    function isValid()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'isValid';
    }
}
if (!function_exists('isConfirm')) {
    function isConfirm()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'confirm';
    }
}
if (!function_exists('isUpdate')) {
    function isUpdate()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'update';
    }
}
if (!function_exists('isStore')) {
    function isStore()
    {
        if (App::runningInConsole()) {
            return false;
        }
        return request()->route()->getActionMethod() === 'store';
    }
}
if (!function_exists('getViewData')) {
    function getViewData($key = null)
    {
        if (request()->route()) {
            return request()->route()->getController()->getViewData($key);
        }
        return null;
    }
}
if (!function_exists('public_url')) {
    function public_url($url)
    {
        $appURL = config('app.url');
        $str = substr($appURL, strlen($appURL) - 1, 1);
        if ($str != '/') {
            $appURL .= '/';
        }
        if (\Illuminate\Support\Facades\Request::secure()) {
            $appURL = str_replace('http://', 'https://', $appURL);
        }
        return $appURL . 'public/' . $url;
    }
}
if (!function_exists('authRoutes')) {
    function authRoutes($area)
    {
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name($area . '.login');
        Route::post('login', 'Auth\LoginController@login')->name($area . '.login');
        Route::middleware(['auth.' . $area])->post('logout', 'Auth\LoginController@logout')->name($area . '.logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name($area . '.register');
        Route::post('register', 'Auth\RegisterController@register')->name($area . '.register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name($area . '.password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name($area . '.password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name($area . '.password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name($area . '.password.reset');
    }
}

if (!function_exists('isBackend')) {
    function isBackend()
    {
        $uri = explode('/', request()->getRequestUri());
        return $uri[1] === getBackendAlias() || request()->getBaseUrl() === getBackendDomain();
    }
}

if (!function_exists('isApi')) {
    function isApi()
    {
        $uri = explode('/', request()->getRequestUri());
        return $uri[1] === getApiAlias() || request()->getBaseUrl() === getApiDomain();
    }
}


if (!function_exists('getCurrentArea')) {
    function getCurrentArea()
    {
        if (\Illuminate\Support\Facades\App::runningInConsole()) {
            return 'batch';
        }
        if (isBackend()) {
            return 'backend';
        }
        if (isApi()) {
            return 'api';
        }
        return 'frontend';
    }
}
if (!function_exists('getCurrentControllerName')) {
    function getCurrentControllerName()
    {
        return getViewData('controllerName');
    }
}
if (!function_exists('getCurrentAction')) {
    function getCurrentAction()
    {
        return getViewData('actionName');
    }
}
if (!function_exists('getBodyClass')) {
    function getBodyClass()
    {
        return ' area-' . getCurrentArea() . ' c-' . getCurrentControllerName() . ' a-' . getCurrentAction() . ' l-' . getCurrentLangCode();
    }
}
if (!function_exists('addParamToUrl')) {
    function addParamToUrl($url, $varName, $value = null)
    {
        if (is_array($varName)) {
            $value = http_build_query($varName);
        } else {
            $value = $varName . "=" . $value;
        }
        // is there already an ?
        if (strpos($url, "?")) {
            $url .= "&" . $value;
        } else {
            $url .= "?" . $value;
        }
        return $url;
    }
}
if (!function_exists('getBreadcrumbText')) {
    function getBreadcrumbText($text)
    {
        if (strpos($text, 'viewData') !== false) {
            $text = str_replace('viewData.', '', $text);
            $text = getViewData($text);
        }
        return $text;
    }
}

if (!function_exists('getHostnameUrl')) {
    function getHostnameUrl($url)
    {
        if (!$url) {
            return '';
        }
        return preg_replace('/^http(s?):\/\//i', '', $url);
    }
}

if (!function_exists('myEncrypt')) {
    function myEncrypt($string, $key)
    {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keyChar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keyChar));
            $result .= $char;
        }

        return base64_encode($result);
    }
}
if (!function_exists('myDecrypt')) {
    function myDecrypt($string, $key)
    {
        $result = '';
        $string = base64_decode($string);

        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keyChar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keyChar));
            $result .= $char;
        }

        return $result;
    }
}
