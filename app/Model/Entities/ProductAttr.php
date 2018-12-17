<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class ProductAttr extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "product_attr";
    protected $fillable = [];
}