<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('昵称');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'unselected'])->default('unselected')->comment('性別');
            $table->string('stu_id', 12)->nullable()->unique()->comment('学号');
            $table->string('tel')->nullable()->comment('手机');
            $table->char('academy', 2)->default('00')->comment('学院代号');
            $table->string('major')->nullable()->comment('专业');
            $table->string('class')->nullable()->comment('班级');
            $table->tinyInteger('department')->default(0)->comment('社团部门');
            $table->string('city')->nullable()->comment('城市');
            $table->string('personal_website')->nullable();
            $table->string('introduction')->nullable();
            $table->string('real_name')->nullable()->index();
            $table->string('qq')->nullable();
            $table->string('wechat')->nullable();
            $table->string('weibo_name')->nullable();
            $table->string('weibo_link')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('identity')->default('社员');
            $table->timestamp('last_actived_at')->nullable();
            $table->tinyInteger('authority')->default(0)->comment('权限');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
