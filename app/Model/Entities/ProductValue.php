<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class ProductValue extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "product_value";
    protected $fillable = ['product_id', 'attr_id', 'value'];
}