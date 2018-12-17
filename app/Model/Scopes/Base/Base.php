<?php

namespace App\Model\Scopes\Base;

/**
 * Trait Base
 * @package App\Model\Scopes\Base
 */
Trait Base
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithTrashed($query)
    {
        return $query->withTrashed();
    }

    /**
     * @param $query
     * @param string $type
     * @return mixed
     */
    public function scopeSortById($query, $type = 'ASC')
    {
        return $this->sortById($query, $type);
    }

    /**
     * @return mixed
     */
    public function scopeSortByIdDesc($query)
    {
        return $this->sortById($query, 'desc');
    }

    // supporter

    /**
     * @param $query
     * @param string $type
     * @return mixed
     */
    public function sortById($query, $type = 'ASC')
    {
        return $query->orderBy('id', $type);
    }

    /**
     * @param $query
     * @param $status
     * @return mixed
     */
    public function scopeWithStatus($query, $status)
    {
        return $query->where($this->getField('status'), $status);
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeWithId($query, $id)
    {
        return $query->where($this->getKeyName(), '=', $id);
    }

    /**
     * @param $query
     * @param $lang
     * @return mixed
     */
    public function scopeWithLang($query, $lang)
    {
        if (is_null($lang)) {
            return $query;
        }
        return $query;
    }

    /**
     * @param $query
     * @param $flag
     * @return mixed
     */
    public function scopeWithUseFlag($query, $flag = true)
    {
        return $query->where($this->getField('useFlag'), $flag == true ? getConstant('USE_FLAG_ON') : $flag);
    }

    /**
     * @param $query
     * @param $flag
     * @return mixed
     */
    public function scopeWithSensorFlag($query, $flag = true)
    {
        return $query->where($this->getField('sensorFlag'), $flag == true ? getConstant('SENSOR_FLAG_ON') : $flag);
    }

    /**
     * @param $query
     * @param $flag
     * @return mixed
     */
    public function scopeWithCCTVFlag($query, $flag = true)
    {
        return $query->where($this->getField('CCTVFlag'), $flag == true ? getConstant('CCTV_APPROVE') : $flag);
    }

}

