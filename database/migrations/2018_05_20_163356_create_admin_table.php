<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateAdminTable extends \App\Database\Migration\Create
{
    protected $_table = 'admin';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('password', 100);
            $table->integer('employee_id')->length(11);
            $table->char('role_type', 1)->comment('1:super_admin; 2:admin; 3:employee; 4:shipper')->default(2);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
