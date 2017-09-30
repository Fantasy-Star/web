<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->text('body_original')->nullable();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->integer('category_id')->unsigned()->default(0)->index();
            $table->integer('praise_count')->default(0)->index();
            $table->enum('is_original', ['yes',  'no'])->default('yes')->index()->comment('是否原创');
            $table->enum('is_excellent', ['yes',  'no'])->default('no')->index();
            $table->decimal('score', 2, 1)->default(0)->comment('评分');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
