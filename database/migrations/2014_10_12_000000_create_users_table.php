<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedMediumInteger('id', true)->comment('編號');
            $table->string('name')->unique()->comment('帳號');
            $table->string('alias')->comment('別名');
            $table->string('password')->comment('密碼');
            $table->enum('role', [ROLE_CO, ROLE_SA, ROLE_A, ROLE_M])->comment('階層角色');
            $table->unsignedMediumInteger('parent_id')->nullable()->comment('父層編號');
            $table->unsignedMediumInteger('co_id')->nullable()->comment('上層股東編號');
            $table->unsignedMediumInteger('sa_id')->nullable()->comment('上層總代理編號');
            $table->unsignedMediumInteger('a_id')->nullable()->comment('上層代理編號');
            $table->unsignedInteger('amount_limit')->nullable()->comment('商戶單日限額');
            $table->string('secret_key')->nullable()->comment('Api 密鑰');
            $table->enum('enable', [ENABLE_ON, ENABLE_OFF, ENABLE_DELETE])->comment('啟用狀態');
            $table->timestamps();

            $table->index('name');
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
