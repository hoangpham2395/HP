<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BackendController;
use App\Http\Supports\AjaxHandle;
use App\Repositories\AdminUserInfoRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class AdminController
 * @package App\Http\Controllers\Backend
 */
class AdminController extends BackendController
{
    use AjaxHandle;

    /**
     * AdminController constructor.
     * @param AdminUserInfoRepository $adminUserInfoRepository
     */
    public function __construct(AdminUserInfoRepository $adminUserInfoRepository)
    {
        parent::__construct();
        $this->setRepository($adminUserInfoRepository);
        $this->setBackUrlDefault('dashboard.index');
    }

    public function errorWithFieldName()
    {
        return true;
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function _findEntityForUpdate($id)
    {
        $entity = parent::_findEntityForUpdate($id);
        empty($entity->userPW) ? $entity->setUserPWAttribute($entity->getOriginal('userPW')) : null;
        return $entity;
    }

    public function destroy($id, $action = 'delete')
    {
        $isValid = $this->getRepository()->getValidator()->validateDestroy($id);
        if (!$isValid) {
            return $this->_backToStart()->withErrors($this->getRepository()->getValidator()->errors());
        }
        $entity = $this->getRepository()->find($id);
        if (!$entity->allowDelete()) {
            return $this->_backToStart()->withErrors(trans('messages.delete_failed'));
        }
        DB::beginTransaction();
        try {
            $this->fireEvent('before_destroy', $entity);
            call_user_func_array([$entity, $action], []);
            $this->_saveRelations($entity, $action);
            DB::commit();
            $this->fireEvent('after_destroy', $entity);
            return $this->_backToStart()->withSuccess(trans('messages.delete_success'));
        } catch (\Exception $e) {
            logError($e);
            DB::rollBack();
        }
        return $this->_backToStart()->withErrors(trans('messages.delete_failed'));
    }
}
