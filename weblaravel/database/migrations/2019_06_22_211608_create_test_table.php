<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->increments('id');
            //用户名
            $table->string('username',50)->default()->unique()->comment('用户名');
            //密码
            $table->char('password',32)->comment('密码');
            //邮箱
            $table->string('user_email',100)->default('')->comment('邮箱');
            //创建时间
            $table->string('create_time',50)->default('1344557966@qq.com')->comment('邮箱');
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
        Schema::dropIfExists('test');
    }
}
