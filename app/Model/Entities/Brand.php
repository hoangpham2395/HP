<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Brand extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "brands";
    protected $fillable = ['brand_name', 'brand_image'];
}