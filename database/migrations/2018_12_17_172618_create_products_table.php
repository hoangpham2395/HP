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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 64);
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->string('model', 128);
            $table->string('made_in', 128);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
