<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class ProductOption extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "product_option";
    protected $fillable = ['product_id', 'color', 'price', 'price_sale', 'sale', 'quantity', 'origin', 'warranty', 'image'];
}