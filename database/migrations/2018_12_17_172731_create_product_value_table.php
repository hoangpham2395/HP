<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductValueTable extends \App\Database\Migration\Create
{
    protected $_table = 'product_value';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('attr_id');
            $table->string('value', 256);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
