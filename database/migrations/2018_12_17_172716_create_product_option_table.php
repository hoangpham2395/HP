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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->string('color', 64)->nullable();
            $table->double('price')->nullable();
            $table->double('price_sale')->nullable();
            $table->text('sale');
            $table->integer('quantity');
            $table->string('origin', 1)->nullable()->default(1);
            $table->string('warranty', 256)->nullable();
            $table->string('image', 256)->nullable();
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
