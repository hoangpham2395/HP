<?php

namespace App\Http\Supports;

/**
 * Trait AjaxSearch
 * @package App\Http\Controllers\Backend\Concerns;
 */
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * Trait AjaxSearch
 * @package App\Http\Supports
 */
trait AjaxSearch
{
    protected $_sessionKey = '__AJAX_SESSION_KEY';

    /**
     * @return mixed
     */
    public function index()
    {
        $key = empty(Input::get('key')) ? $this->_newKey() : Input::get('key');
        $params = Session::get($this->_sessionKey . '.' . Input::get('key'));
        $this->setViewData([
            'entities' => $this->getRepository()->getListForAjax($this->_getAjaxParams($params, '_ajax_list_data'), $this->_getPage($params, '_ajax_list_data')),
            'ajaxParams' => Input::all(),
            'key' => $key,
        ]);

        return $this->render();
    }

    /**
     * @return mixed
     */
    public function ajaxSearch()
    {
        $viewFile = Input::get('view_file', '_ajax_list_data');
        $keyUrl = Input::get('key_url', '');
        $this->detectCurrentPage();
        $entities = $this->getRepository()->getListForAjax(Input::all(), getConstant('default_page'));
        $this->_setAjaxParams($viewFile);
        $entities->setPath(route($this->getCurrentControllerName() . '.index'));
        $this->setEntities($entities);
        $this->setViewData(['keyUrl' => $keyUrl]);
        $html = [
            'content' => $this->render('backend.' . $this->getCurrentControllerName() . '.' . $viewFile)->render(),
            'paginator' => $this->render('layouts.backend.elements.paginator')->render(),
            'paginatorInfo' => $this->render('layouts.backend.elements.pagination_info')->render(),
        ];

        $this->setData($html);
        return $this->renderJson();
    }

    /**
     * @return array
     */
    protected function _getDefaultParams()
    {
        return [
            'per_page' => backendPaginate('per_page.default'),
            'search' => '',
            'page' => getConstant('default_page'),
            'sort_type' => 'asc',
            'sort_field' => $this->getRepository()->getModel()->getKeyName()
        ];
    }

    /**
     * @param $params
     * @param $viewFile
     * @return array
     */
    protected function _getAjaxParams($params, $viewFile)
    {
        $currentParams = array_get($params, $viewFile, array());
        return array_merge($this->_getDefaultParams(), $currentParams);
    }

    /**
     * @param $params
     * @param $viewFile
     * @return mixed
     */
    protected function _getPage($params, $viewFile)
    {
        $currentParams = array_get($params, $viewFile, array());
        return array_get($currentParams, 'page', getConstant('default_page'));
    }

    /**
     * @param string $viewFile
     */
    protected function _setAjaxParams($viewFile = '_ajax_list_data')
    {
        if (empty($key = Input::get('key'))) {
            return;
        }
        $inputParams = [
            'per_page' => Input::get('per_page', backendPaginate('per_page.default')),
            'page' => Input::get('page', getConstant('default_page')),
            'search' => Input::get('search', ''),
            'sort_type' => Input::get('sort_type', 'asc'),
            'sort_field' => Input::get('sort_field', $this->getRepository()->getModel()->getKeyName()),
        ];

        $ajaxKey = Session::get($this->_sessionKey);
        $params = array_get($ajaxKey, $key, array());

        $ajaxParam = array_get($params, $viewFile, array());
        $result = array_merge($ajaxParam, $inputParams);

        $ajaxKey[$key][$viewFile] = $result;
        Session::put($this->_sessionKey, $ajaxKey);
    }

    /**
     * @return string
     */
    protected function _newKey()
    {
        $ajaxKeys = Session::get($this->_sessionKey) ? Session::get($this->_sessionKey) : [];
        global $urlIdx;
        $urlIdx++;
        $time = time() . $urlIdx;
        krsort($ajaxKeys, SORT_STRING);
        if (!empty($ajaxKeys)) {
            $limit = getSystemConfig('back_url_limit');
            $ajaxKeys = array_chunk($ajaxKeys, $limit - 1, true);
            $ajaxKeys = $ajaxKeys[0];
        }
        $ajaxKeys[$time] = array();
        Session::put($this->_sessionKey, $ajaxKeys);

        return $time;
    }
}