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
        Schema::table($this->getTable(), function (Blueprint $table) {
            //
        });
    }
}
