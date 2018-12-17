<?php

namespace App\Model\Presenters;
/**
 * Trait AdminUserInfo
 * @package App\Model\Presenters
 */
/**
 * Trait UserInfo
 * @package App\Model\Presenters
 */
trait AdminUserInfo
{
    use Base;

    /**
     * @return string
     */
    public function passwordText()
    {
        $v = $this->getAttribute('login_password') ? '******' : '';
        return '<input readonly="true" type="password" name="password" value="' . $v . '" style="border: none;">';
    }

    /**
     * @return bool
     */
    public function isSupperAdmin()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isOwner()
    {
        return getCurrentUserId() == $this->getKey();
    }

    /**
     * @return bool
     */
    public function allowEdit()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function allowDelete()
    {
        return backendGuard()->user()->isSupperAdmin() && !$this->isOwner();
    }

    public function getUsernameOrEmail()
    {
        return $this->username ? $this->username : $this->emailAddress;
    }
}