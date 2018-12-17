<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductsTable extends \App\Database\Migration\Create
{
    protected $_table = 'products';
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
