<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateCommentsTable extends \App\Database\Migration\Create
{
    protected $_table = 'comments';
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
