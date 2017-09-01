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
            $table->string('book_name', 100);
            $table->string('isbn', 30);
            $table->string('author', 50);
            $table->string('publisher', 100);
            $table->date('pub_date')->comment('出版日期');
            $table->decimal('price', 6, 2)->default(0);
            $table->integer('book_num')->comment('书本总数');
            $table->integer('remain_num')->comment('剩余数量');
            $table->decimal('douban_score', 2, 1)->default(0)->comment('豆瓣评分');
            $table->text('note')->comment('备注');
            $table->text('description')->comment('内容描述');
            $table->tinyInteger('recommend')->default(0)->comment('推荐');
            $table->integer('cid')->comment('种类');
            $table->string('tags')->comment('标签');
            $table->string('book_pic')->comment('封面图片');
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
