<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductOptionTable extends \App\Database\Migration\Create
{
    protected $_table = 'product_option';
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
