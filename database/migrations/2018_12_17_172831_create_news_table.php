<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateNewsTable extends \App\Database\Migration\Create
{
    protected $_table = 'news';
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
