<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class OrderDetail extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "order_detail";
    protected $fillable = [];
}