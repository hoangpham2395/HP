<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class ProductGroup extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "product_group";
    protected $fillable = [];
}