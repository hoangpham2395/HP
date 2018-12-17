<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductAttrTable extends \App\Database\Migration\Create
{
    protected $_table = 'product_attr';
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
