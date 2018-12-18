<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Comment extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "comments";
    protected $fillable = ['name', 'comment', 'parent_id'];
}