<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_payment', function (Blueprint $table) {
            $table->unsignedMediumInteger('id', true);
            $table->unsignedMediumInteger('channels_id')->comment('渠道編號');
            $table->unsignedMediumInteger('payments_id')->comment('交易方式編號');
            $table->unsignedInteger('min_limit')->comment('最小限額');
            $table->unsignedInteger('max_limit')->comment('最大限額');
            $table->unsignedInteger('amount_limit')->comment('交易限額');
            $table->decimal('fee', 5, 2)->comment('手續費 %');
            $table->decimal('cost', 5, 2)->comment('單筆手續費');
            $table->enum('fee_type', ['F', 'C'])->comment('收費方式');
            $table->decimal('deposit_fee', 5, 2)->comment('下發手續費 %');
            $table->decimal('deposit_cost', 5, 2)->comment('下發單筆手續費');
            $table->enum('deposit_fee_type', ['F', 'C'])->comment('下發收費方式');
            $table->enum('delivery_type', ['D', 'T'])->default('D')->comment('下發類型');
            $table->unsignedTinyInteger('delivery_day')->default(0)->comment('下發天數');
            $table->enum('enable', [ENABLE_ON, ENABLE_OFF, ENABLE_DELETE])->comment('啟用狀態');
            $table->string('remark')->nullable()->comment('備註');
            $table->timestamps();

            $table->index('channels_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_payment');
    }
}
