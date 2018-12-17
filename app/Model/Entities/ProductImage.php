<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class ProductImage extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "product_images";
    protected $fillable = [];
}