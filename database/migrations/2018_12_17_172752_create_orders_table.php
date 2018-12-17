<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateOrdersTable extends \App\Database\Migration\Create
{
    protected $_table = 'orders';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 64);
            $table->double('total_price');
            $table->string('sex', 1)->default(1)->comment('1:nam; 2:nu');
            $table->string('address', 256);
            $table->string('tel', 20);
            $table->string('status', 1)->default(1);
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
