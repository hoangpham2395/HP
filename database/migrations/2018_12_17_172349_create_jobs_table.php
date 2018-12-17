<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateJobsTable extends \App\Database\Migration\Create
{
    protected $_table = 'jobs';
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
