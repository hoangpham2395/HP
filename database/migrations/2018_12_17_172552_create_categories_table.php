<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateCategoriesTable extends \App\Database\Migration\Create
{
    protected $_table = 'categories';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 64);
            $table->string('category_image', 256)->nullable();
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
