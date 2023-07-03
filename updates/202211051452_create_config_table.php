<?php

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateTable extends Migration
{
    public function up()
    {
        Schema::create('wpjscc_ui_configs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('code', 10)->index('idx_code');
            $table->boolean('is_default')->default(false);
            $table->text('config')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('sort_order')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('wpjscc_ui_configs');
    }
}
