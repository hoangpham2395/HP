<?php

use \App\Database\Migration\CustomBlueprint as Blueprint;

class CreateProductAttrTable extends \App\Database\Migration\Create
{
    protected $_table = 'product_attr';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('attr_name', 64);
            $table->integer('group_id');
            $table->char('type')->default(1);
            $table->string('length', 32)->nullable()->default(256);
            $table->char('is_null')->default(0)->comment('0:null; 1:not null');
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
