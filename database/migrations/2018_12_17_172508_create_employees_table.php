<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateEmployeesTable extends \App\Database\Migration\Create
{
    protected $_table = 'employees';
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
