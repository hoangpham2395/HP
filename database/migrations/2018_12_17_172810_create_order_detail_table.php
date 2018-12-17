<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateOrderDetailTable extends \App\Database\Migration\Create
{
    protected $_table = 'order_detail';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
