<?php

namespace App\Model\Entities;

use App\Model\Base\Auth\User;
use Illuminate\Notifications\Notifiable;

class AdminUserInfo extends User
{
    protected $primaryKey = 'id';
    protected $table = "admin";
    use Notifiable;
    use \App\Model\Presenters\AdminUserInfo;
    protected $fillable = ['email', 'password', 'role_type', 'employee_id'];

    protected $hidden = ['password'];

    public function setUserPWAttribute($value)
    {
        $this->attributes['password'] = genPassword($value);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }
}

