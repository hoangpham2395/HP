<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class News extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "news";
    protected $fillable = [];
}