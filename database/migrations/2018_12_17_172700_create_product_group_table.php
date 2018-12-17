<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductGroupTable extends \App\Database\Migration\Create
{
    protected $_table = 'product_group';
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
