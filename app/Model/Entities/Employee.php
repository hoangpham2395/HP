<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Employee extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "employees";
    protected $fillable = ['name', 'email', 'tel', 'avatar', 'address', 'job_id', 'id_number', 'bank_account', 'description'];
}