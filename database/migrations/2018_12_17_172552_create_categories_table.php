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
        Schema::table($this->getTable(), function (Blueprint $table) {
            //
        });
    }
}
