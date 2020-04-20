<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment', function (Blueprint $table) {
            $table->unsignedMediumInteger('user_id')->comment('商戶編號');
            $table->unsignedMediumInteger('channel_payment_id')->comment('交易方式編號');
            $table->decimal('co_p', 5, 2)->comment('股東手續費 %');
            $table->decimal('sa_p', 5, 2)->comment('總代理手續費 %');
            $table->decimal('a_p', 5, 2)->comment('代理手續費 %');
            $table->decimal('fee', 5, 2)->comment('商戶手續費 %');
            $table->decimal('cost', 5, 2)->comment('每筆支付的固定費用');
            $table->enum('fee_type', ['F', 'C'])->comment('收費方式');
            $table->unsignedInteger('amount_limit')->comment('交易限額');
            $table->unsignedInteger('min_limit')->comment('充值最小限額');
            $table->unsignedInteger('max_limit')->comment('充值最大限額');
            $table->enum('enable', [ENABLE_ON, ENABLE_OFF, ENABLE_DELETE])
                ->default(ENABLE_ON)->comment('啟用狀態');
            $table->timestamps();

            $table->primary(['user_id', 'channel_payment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_payment');
    }
}
