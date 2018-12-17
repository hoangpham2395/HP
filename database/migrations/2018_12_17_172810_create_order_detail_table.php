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
        Schema::table($this->getTable(), function (Blueprint $table) {
            //
        });
    }
}
