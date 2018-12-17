<?php

namespace App\Http\Controllers\Base;

use App\Events\BaseEvent;
use App\Helpers\Url;
use App\Helpers\Facades\CustomStorage;
use App\Http\Controllers\Controller;

use App\Http\Supports\ApiResponse;
use App\Http\Supports\Events;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\ControllerDispatcher;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;


/**
 * Class BaseController
 * @package App\Http\Controllers\Base
 */
class BaseController extends Controller
{
    use BaseEvent;
    use ApiResponse;
    use Events;
    /**
     * @var string
     */
    protected $_confirmRoute = '';
    /**
     * @var null
     */
    protected $_repository = null;
    /**
     * @var string
     */
    protected $_backUrlDefault = '';
    /**
     * @var bool
     */
    protected $_isHome = false;
    /**
     * @var array
     */
    protected $_statics = array();
    /**
     * @var string
     */
    protected $_title = '';

    protected $_siteDescription = '';

    protected $_siteImage = '';

    protected $_viewData = array();
    /**
     * @var string
     */
    protected $_area = '';

    protected $_h1 = '';

    /**
     * @return string
     */
    public function getH1(): string
    {
        return $this->_h1;
    }

    /**
     * @param string $h1
     */
    public function setH1(string $h1)
    {
        $this->_h1 = $h1;
    }

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        try {
            $this->setTitle(config('app.name'));
            $this->setSiteDescription(config('app.description'));
            $this->setSiteImage(config('app.image'));
            Url::setCurrentControllerName($this->getCurrentControllerName());
            $this->setEventPrefix(getConstant('EVENT_CONTROLLER_TYPE', 'controller'));
            $this->setEventSuffix($this->getArea() . '.' . $this->getCurrentControllerName());
        } catch (\Exception $e) {
            logError($e);
        }
    }

    /**
     * @return string
     */
    public function getSiteDescription()
    {
        return $this->_siteDescription;
    }

    /**
     * @param string $siteDescription
     */
    public function setSiteDescription($siteDescription)
    {
        $this->_siteDescription = $siteDescription;
    }

    /**
     * @return string
     */
    public function getSiteImage()
    {
        return $this->_siteImage;
    }

    /**
     * @param string $siteImage
     */
    public function setSiteImage($siteImage)
    {
        $this->_siteImage = $siteImage;
    }


    /**
     * @return string
     */
    public function getArea()
    {
        return $this->_area;
    }

    /**
     * @param string $area
     */
    public function setArea($area)
    {
        $this->_area = $area;
    }


    /**
     * @return array
     */
    public function getViewData($key = null)
    {
        if ($key) {
            return array_get($this->_viewData, $key);
        }
        return $this->_viewData;
    }

    /**
     * @param array $viewData
     * @return $this
     */
    public function setViewData($viewData)
    {
        $this->_viewData = array_merge($this->getViewData(), (array)$viewData);
        return $this;
    }


    /**
     * @return string
     */
    public function getConfirmRoute()
    {
        return $this->_confirmRoute;
    }

    /**
     * @param string $confirmRoute
     */
    public function setConfirmRoute($confirmRoute)
    {
        $this->_confirmRoute = $confirmRoute;
    }


    /**
     * @return string
     */
    public function getCurrentRouteName()
    {
        return Route::currentRouteName();
    }

    /**
     * @return string
     */
    public function getCurrentRoute()
    {
        return Route::current();
    }

    /**
     * @return mixed
     */
    public function getCurrentController()
    {
        $cA = $this->_getControllerAction();
        return $cA['controller'];
    }

    /**
     * @return array
     */
    protected function _getControllerAction()
    {
        $currentAction = Route::currentRouteAction();
        list($controller, $action) = explode('@', $currentAction);
        return [
            'controller' => $controller,
            'action' => $action
        ];
    }

    /**
     * @param bool $toUnder
     * @return mixed|string
     */
    public function getCurrentControllerName($toUnder = true)
    {
        $controller = explode('\\', $this->getCurrentController());
        $controller = str_replace('Controller', '', $controller[4]);
        return $toUnder ? toUnderScore($controller) : $controller;
    }

    /**
     * @param bool $toUnder
     * @return mixed|string
     */
    public function getCurrentAction($toUnder = true)
    {
        $cA = $this->_getControllerAction();
        $action = $cA['action'];
        return $toUnder ? toUnderScore($action) : $action;
    }

    /**
     * @return null
     */
    public function getRepository()
    {
        return $this->_repository;
    }

    public function setRepository($repository)
    {
        $this->_repository = $repository;
        $this->setModel($repository->getModel());
        return $this;
    }

    public function setModel($model)
    {
        $this->setViewData(['model' => $model]);
    }

    /**
     * @return bool
     */
    public function isHome()
    {
        return $this->_isHome;
    }

    /**
     * @param bool $isHome
     */
    public function setIsHome($isHome)
    {
        $this->_isHome = $isHome;
    }

    /**
     * @return string
     */
    public function getBackUrlDefault()
    {
        return $this->_backUrlDefault;
    }

    /**
     * @param string $backUrlDefault
     */
    public function setBackUrlDefault($backUrlDefault)
    {
        $this->_backUrlDefault = $backUrlDefault;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $title . $this->getTitle();
    }

    /**
     * @return array
     */

    public function getStatics()
    {
        return $this->_statics;
    }
    //

    /**
     * @param array $statics
     */
    public function setStatics($statics)
    {
        $this->_statics = $statics;
    }

    /**
     * @param $entity
     * @return $this
     */
    public function setEntity($entity)
    {
        $this->setViewData(array('entity' => $entity));
        return $this;
    }

    public function getEntity()
    {
        return $this->getViewData('entity');
    }

    /**
     * @param $entities
     * @return $this
     */
    public function setEntities($entities)
    {
        $this->setViewData(array('entities' => $entities));
        return $this;
    }

    public function getEntities()
    {
        return $this->getViewData('entities');
    }

    /**
     * @param $file
     * @return BaseController
     */
    protected function _pushCss($file)
    {
        return $this->_pushStaticFile($file, 'css');
    }

    /**
     * @param $file
     * @return BaseController
     */
    protected function _pushJs($file)
    {
        return $this->_pushStaticFile($file, 'js');
    }

    /**
     * @param $file
     * @param string $type
     * @return $this
     */
    protected function _pushStaticFile($file, $type = 'css')
    {
        $statics = $this->getStatics();
        $files = isset($statics[$type]) ? $statics[$type] : array();
        $files[] = $file;
        $statics[$type] = $files;
        $this->setStatics($statics);
        return $this;
    }

    /**
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    public function render($view = null, $data = [], $mergeData = [])
    {
        $view = $view ? $view : $this->getArea() . '.' . $this->getCurrentControllerName() . '.' . $this->getCurrentAction() . $view;
        $actionName = $this->getCurrentAction();
        $routeName = $this->getCurrentRouteName();
        $routePrefix = str_replace('.' . $actionName, '', $routeName);
        $data += array(
            'title' => $this->getTitle(),
            'statics' => $this->getStatics(),
            'isHome' => $this->_isHome,
            '_form' => $this->getArea() . '.' . $this->getCurrentControllerName() . '._form',
            'controllerName' => $this->getCurrentControllerName(),
            'actionName' => $actionName,
            'routeName' => $routeName,
            'routePrefix' => $routePrefix,
            'area' => $this->getArea(),
            'siteDescription' => $this->getSiteDescription(),
            'siteImage' => $this->getSiteImage(),
            'h1' => $this->getH1(),
        );
        $data += $this->getViewData();
        $this->setViewData($data);
        $this->fireEvent('before_render', $data);
        $response = view($view, $data, $mergeData);
        $this->fireEvent('after_render', $response);
        return $response;

    }

    public function getEventName($name)
    {
        return getEventName(getConstant('EVENT_CONTROLLER_TYPE') . '.' . $name);
    }

    /**
     *
     */
    public function detectCurrentPage()
    {
        $currentPage = Input::get('page', getConstant('default_page'));
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
    }

    /**
     * @return bool
     */
    public function getCurrentUser()
    {
        return null;
    }

    /**
     *
     */
    public function index()
    {
    }

    /**
     * @param $id
     */
    public function show($id)
    {
    }

    /**
     *
     */
    public function store()
    {
    }

    /**
     *
     */
    public function valid()
    {

    }

    /**
     *
     */
    public function confirm()
    {
    }

    /**
     *
     */
    public function create()
    {

    }

    /**
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * @param $id
     */
    public function update($id)
    {

    }

    /**
     * @param $action
     * @param $id
     */
    public function destroy($id, $action = 'delete')
    {

    }

    /**
     * @param string $action
     * @return mixed
     */
    public function massDestroy($action = 'delete')
    {
        try {
            $key = $this->getRepository()->getKeyName();
            $id = array_unique(array_filter(explode(',', Input::get($key, ''))));
            if (empty($id)) {
                return $this->_backToStart()->withErrors(trans('messages.delete_failed'));
            }
            $this->getRepository()->whereIn($key, $id)->get()->map(function ($e) use ($action){
                return $e->$action();
            });
            return $this->_backToStart()->withSuccess(trans('messages.delete_success'));
        } catch (\Exception $e) {
            logError($e);
        }
        return $this->_backToStart()->withErrors(trans('messages.delete_failed'));
        //@todo destroy relations data
    }

    /**
     * @param null $id
     * @param bool $clean
     * @param bool $getForUpdate
     * @return mixed
     */
    protected function _findOrNewEntity($id = null, $clean = false, $getForUpdate = false)
    {
        $data = $this->_getFormData(false, $clean);
        $key = $this->getRepository()->getKeyName();
        !isset($data[$key]) ? $data[$key] = $id : null;
        return $this->getRepository()->findFirstOrNew($data, $getForUpdate);
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function _findEntityForUpdate($id)
    {
        return $this->_findOrNewEntity($id, true, true);
    }

    /**
     * @return mixed
     */
    protected function _findEntityForStore()
    {
        return $this->_findOrNewEntity(null, true);
    }

    protected function _prepareShow($id)
    {
        return $this->setEntity($this->getRepository()->findWithRelation($id));
    }

    /**
     * @return mixed
     */
    protected function _prepareCreate()
    {
        return $this->_findOrNewEntity(true);
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function _prepareEdit($id = null)
    {
        return $this->_findOrNewEntity($id, true);
    }

    public function exportCsv()
    {

    }

    /**
     * @return RedirectResponse
     */
    protected function _toConfirm()
    {
        Url::collectOldUrl();
        $key = $this->getRepository()->getKeyName();
        return $this->_toRoute($this->getConfirmRoute(), [$key => Input::get($key), Url::QUERY => getBackParams()]);
    }

    /**
     * @return mixed
     */
    protected function _inValid($errors = null)
    {
        $this->fireEvent('before_in_valid', $this);
        $result = $this->_back()->withErrors(['inValid' => $errors ? $errors : $this->getRepository()->getValidator()->errors()])// send back all errors
        ->withInput(); // send back the input
        $this->fireEvent('after_in_valid', $result);
        return $result;
    }

    /**
     * @param $controller
     * @param $action
     * @return mixed
     */
    public function forward($controller, $action)
    {
        $container = app();
        $route = $this->getCurrentRoute();
        $controllerInstance = $container->make($controller);
        return (new ControllerDispatcher($container))->dispatch($route, $controllerInstance, $action);
    }

    /**
     * @param array $params
     * @return RedirectResponse
     */
    protected function _backToStart($params = array())
    {
        $url = Url::getBackUrl(false, $this->getBackUrlDefault());
        return $this->_to($url, $params);
    }

    /**
     * @return mixed
     */
    protected function _back()
    {
        return Redirect::back();
    }

    /**
     * @param $route
     * @param $params
     * @return RedirectResponse
     */
    protected function _toRoute($route, $params)
    {
        return redirect()->route($route, $params);
    }

    /**
     * @param $url
     * @param array $params
     * @return RedirectResponse
     */
    protected function _to($url, $params = array())
    {
        $data = ['url' => $url, 'params' => $params];
        $this->fireEvent('before_redirect', $data);
        $url = $data['url'];
        $params = $data['params'];
        if (strpos($url, 'http') !== false) {
            return new RedirectResponse(url($url, $params));
        }
        if (strpos($url, '.') !== false) {
            $url = route($url, $params);
        }
        $r = Redirect::to($url)->with($params);
        $this->fireEvent('after_redirect', $r);
        return $r;
    }

    /**
     * @return RedirectResponse
     */
    protected function _redirectToHome()
    {
        return $this->_to('/');
    }

    /**
     * @return string
     */
    protected function _getFormDataKey()
    {
        return $this->getArea() . '_' . $this->getCurrentControllerName();
    }

    /**
     * @param $data
     * @return $this
     */
    protected function _setFormData($data)
    {
        Session::put([$this->_getFormDataKey() => $data]);
        return $this;
    }

    /**
     * @param bool $toObject
     * @param bool $clean
     * @return mixed
     */
    protected function _getFormData($toObject = true, $clean = false)
    {
        $data = Session::get($this->_getFormDataKey(), array());
        if ($clean) {
            $this->_cleanFormData($data);
        }
        return $toObject ? $this->getRepository()->findFirstOrNew($data) : $data;
    }

    /**
     * @param $data
     */
    protected function _cleanFormData($data = [])
    {
        Session::put([$this->_getFormDataKey() => []]);
        Session::flash('hasClean', !empty($data));
    }

    protected function _hasClean($clean = true)
    {
        $r = Session::get('hasClean');
        $clean ? Session::put('hasClean', null) : null;
        return $r;
    }

    protected function _hasInValid()
    {
        return session()->has('errors') && session()->get('errors')->has('inValid');
    }

    /**
     * @return bool
     */
    protected function _emptyFormData()
    {
        return empty($this->_getFormData(false));
    }

    /**
     * @return bool
     */
    protected function _isRefresh()
    {
        return isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' || $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
    }

    protected function _removeMediaFile($entity)
    {
        try {
            if (!$entity) {
                return true;
            }
            $fields = $entity->_file_name;
            foreach ((array)$fields as $field) {
                CustomStorage::delete($entity->$field);
            }
        } catch (\Exception $e) {

        }
    }

    protected function _getNewMediaFileName($entity, $field)
    {
        $ext = pathinfo(array_get($entity->tmp_file, $field), PATHINFO_EXTENSION);
        $newFileName = $this->getCurrentControllerName() . DIRECTORY_SEPARATOR . time() . rand(0, 9999) . '_' . $entity->getNextInsertId() . '.' . $ext;
        return $newFileName;
    }

    protected function _moveFileFromTmpToMedia(&$entity)
    {
        $this->fireEvent(getEventName('before_move_file_from_tmp_to_media'), $entity);
        if (($entity->getKey() && !$entity->tmp_file) || !$entity->tmp_file) {
            return;
        }
        $fields = $entity->_file_name;
        foreach ((array)$fields as $field) {
            $tmp = array_get($entity->tmp_file, $field);
            if (empty($tmp)) {
                continue;
            }
            $entity->$field = CustomStorage::moveFromTmpToMedia($tmp, $this->_getNewMediaFileName($entity, $field));
        }
        $this->fireEvent(getEventName('after_move_file_from_tmp_to_media'), $entity);
    }

    protected function _processFile()
    {
        $params = $this->_getParams();
        $this->fireEvent('before_process_file', $params);
        if (empty(array_get($params, '_file_name'))) {
            return;
        }
        $fieldName = array_get($params, '_file_name');
        foreach ($fieldName as $field) {
            if (!isset($params[$field]) || empty($params[$field]) || is_scalar($params[$field])) {
                continue;
            }
            $originalName = $params[$field]->getClientOriginalName();
            $unique = hash('sha1', uniqid(time(), true));
            $fileName = $unique . '.' . $params[$field]->getClientOriginalExtension();
            $fileName = CustomStorage::uploadToTmp($fileName, $params[$field]);
            $params[$field] = $originalName;
            $params['original_files'] = [$field => $originalName];
            array_set($params, $field, $fileName);
            $params['tmp_file'][$field] = $fileName;
        }
        $this->fireEvent('after_process_file', $params);
        $this->_setFormData($params);
    }

    /**
     * @return mixed
     */
    protected function _getParams()
    {
        return Input::all();
    }

    public function setErrorFlash($message)
    {
        $message = new MessageBag(['errors' => [$message]]);
        Session::flash('errors', $message);
    }

    public function setSuccessFlash($message)
    {
        $message = new MessageBag(['success' => [$message]]);
        Session::flash('success', $message);
    }

    public function flashError($message)
    {
        Session::flash('flash_errors', $message);
    }

    public function flashSuccess($message)
    {
        Session::flash('flash_success', $message);
    }

    protected function _saveRelations($entity, $action = 'save')
    {
        if (in_array($action, ['delete', 'forceDelete', 'massDelete'])) {
            return true;
        }
        $relations = $entity->getRelations();
        foreach ($relations as $relationName => $relation) {
            if (isCollection($relation)) {
                $relation->map(function ($item) use ($entity, $action, $relationName) {
                    $item->exists = (bool)$item->getKey();
                    $item->fill([$entity->$relationName()->getForeignKeyName() => $entity->getKey()]);
                    call_user_func_array([$item, $action], []);
                    $this->_saveRelations($item, $action);
                });
                continue;
            }
            $relation->exists = (bool)$relation->getKey();
            $relation->fill([$entity->getForeignKey() => $entity->getKey()]);
            call_user_func_array([$relation, $action], []);
            $this->_saveRelations($relation);
        }
    }
}
