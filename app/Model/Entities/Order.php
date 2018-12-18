<?php
namespace App\Model\Entities;

use App\Model\Base\ModelSoftDelete;

class Order extends ModelSoftDelete
{
    protected $primaryKey = 'id';
    protected $table = "orders";
    protected $fillable = ['username', 'total_price', 'sex', 'address', 'tel', 'status'];
}