<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->commsnt('父级种类');
            $table->string('name')->unique()->comment('种类名称');
            $table->string('slug',60)->unique()->comment('缩略名');
            $table->string('description')->comment('缩略名');
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
        Schema::dropIfExists('book_category');
    }
}
