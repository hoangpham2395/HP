<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateBrandsTable extends \App\Database\Migration\Create
{
    protected $_table= 'brands';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_name', 64);
            $table->string('brand_image', 256)->nullable();
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
