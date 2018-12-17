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
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->text('comment');
            $table->integer('parent_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
