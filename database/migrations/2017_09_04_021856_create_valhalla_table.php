<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValhallaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valhalla', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned()->comment('年份');
            $table->string('name',100);
            $table->string('title')->nullable()->comment('称号');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('position');
            $table->tinyInteger('department')->default(0)->comment('社团部门');
            $table->integer('user_id')->unsigned()->nullable()->comment('本站用户ID');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valhalla');
    }
}
