<?php

namespace App\Http\Supports;
/**
 * Trait Response
 * @package App\Http\Supports
 */
/**
 * Trait Events
 * @package App\Http\Supports
 */
trait Events
{

    /**
     * @param $data
     */
    public function beforeRender(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterRender(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeRenderJson(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterRenderJson(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeRenderXml(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterRenderXml(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeRedirect(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterRedirect(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeCreate(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterCreate(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeUpdate(&$data)
    {
        $this->beforeSave($data);
    }

    /**
     * @param $data
     */
    public function afterUpdate(&$data)
    {
        $this->afterSave($data);
    }

    /**
     * @param $data
     */
    public function beforeSave(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterSave(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeStore(&$data)
    {
        $this->beforeSave($data);
    }

    /**
     * @param $data
     */
    public function afterStore(&$data)
    {
        $this->afterSave($data);
    }

    /**
     * @param $data
     */
    public function beforeDestroy(&$data)
    {
        $this->beforeSave($data);
    }

    /**
     * @param $data
     */
    public function afterDestroy(&$data)
    {
        $this->afterSave($data);
    }

    /**
     * @param $data
     */
    public function beforeMassDestroy(&$data)
    {
        $this->beforeSave($data);
    }

    /**
     * @param $data
     */
    public function afterMassDestroy(&$data)
    {
        $this->afterSave($data);
    }

    /**
     * @param $data
     */
    public function beforeValid(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterValid(&$data)
    {
    }

    /**
     * @param $data
     */
    public function beforeConfirm(&$data)
    {
    }

    /**
     * @param $data
     */
    public function afterConfirm(&$data)
    {
    }
}