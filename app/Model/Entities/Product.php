<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Product extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "products";
    protected $fillable = ['product_name', 'brand_id', 'category_id', 'model', 'made_in'];
}