<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateOrdersTable extends \App\Database\Migration\Create
{
    protected $_table = 'orders';
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
