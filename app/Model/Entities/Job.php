<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Job extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "jobs";
    protected $fillable = [];
}