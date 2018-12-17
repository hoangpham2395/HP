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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('email', 256);
            $table->string('tel', 20);
            $table->string('avatar', 256)->nullable();
            $table->string('address', 256);
            $table->integer('job_id');
            $table->string('id_number', 20);
            $table->string('bank_account', 20)->nullable();
            $table->text('description')->nullable();
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
