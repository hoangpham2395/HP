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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('group', 64);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
