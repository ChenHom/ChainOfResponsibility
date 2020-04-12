<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->unsignedMediumInteger('id', true);
            $table->string('name')->comment('渠道名稱');
            $table->string('slug')->comment('渠道 slug');
            $table->unsignedInteger('amount_limit')->comment('每日交易限額');
            $table->enum('enable', [ENABLE_ON, ENABLE_OFF, ENABLE_DELETE])->comment('狀態');
            $table->string('remark')->nullable()->comment('備註');
            $table->timestamps();

            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
