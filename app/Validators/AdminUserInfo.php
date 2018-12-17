<?php

namespace App\Validators;

use App\Validators\Base\BaseValidator;

/**
 * Class AdminUserInfo
 * @package App\Validator
 */
class AdminUserInfo extends BaseValidator
{
    /**
     * @param $data
     * @return bool
     */
    public function validateLogin($data)
    {
        $rules = array(
            'email' => 'required', // make sure the email is an actual email
            'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $messages = [
            'email.required' => trans('auth.id_required'),
            'password.required' => trans('auth.password_required'),
        ];
        return $this->_addRules($rules, $messages)->with($data)->passes();
    }

    /**
     * @return array
     */
    protected function _getRulesDefault()
    {
        $rules = [
            'userID' => 'required|max:100' . $this->_getUniqueInDbRule($this->getModel()->getTableName(), ['userID', $this->getModel()->getKeyName()]),
            'emailAddress' => 'nullable|email|max:100' . $this->_getUniqueInDbRule($this->getModel()->getTableName(), ['emailAddress', $this->getModel()->getKeyName()]),
            'userPW' => 'nullable|same:userCPW|min:6|max:8',
            'phoneNumber' => 'nullable|phone',
        ];
        return $rules;
    }

    /**
     * @return array
     */
    protected function _buildCreateRules()
    {
        return [
            'rules' => $this->_buildRules([
                'userPW' => 'required|same:userCPW|min:6|max:100',
                'userCPW' => 'required|min:6|max:100',
            ])
        ];
    }

}