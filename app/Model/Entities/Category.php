<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Category extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "categories";
    protected $fillable = ['category_name', 'category_image'];
}