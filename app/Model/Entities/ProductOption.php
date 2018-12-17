<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class ProductOption extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "product_option";
    protected $fillable = [];
}