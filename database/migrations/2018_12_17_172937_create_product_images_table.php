<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductImagesTable extends \App\Database\Migration\Create
{
    protected $_table = 'product_images';
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
            $table->string('image', 256);
            $table->string('type', 1)->default(1);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
