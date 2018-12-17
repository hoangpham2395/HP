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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->text('content');
            $table->actionBy();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
