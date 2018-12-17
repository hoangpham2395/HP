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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_name', 64);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
