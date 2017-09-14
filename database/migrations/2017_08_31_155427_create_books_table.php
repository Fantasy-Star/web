<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('书本名称');
            $table->string('isbn')->nullable();
            $table->string('author')->nullable()->comment('作者');
            $table->string('publisher')->comment('出版社');
            $table->date('pub_date')->comment('出版日期');
            $table->decimal('price', 6, 2)->default(0);
            $table->integer('total')->default(1)->comment('书本总数');
            $table->integer('remain_num')->default(1)->comment('剩余数量');
            $table->decimal('douban_score', 2, 1)->default(0)->comment('豆瓣评分');
            $table->text('note')->nullable()->comment('备注');
            $table->text('description')->nullable()->comment('内容描述');
            $table->tinyInteger('recommend')->default(0)->comment('推荐');
            $table->integer('cid')->default(0)->comment('种类');
            $table->string('tags')->nullable()->comment('标签');
            $table->string('book_pic')->nullable()->comment('封面图片');
            $table->integer('user_id')->comment('当前保管者');
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
        Schema::dropIfExists('books');
    }
}
