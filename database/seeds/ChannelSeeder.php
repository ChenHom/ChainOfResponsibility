<?php

use App\Entities\Channel;
use App\Entities\Payment;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->truncate();
        $channel = Channel::create([
            'name' => 'PSeeHom',
            'slug' => 'PSeeHom',
            'amount_limit' => 9000000,
        ]);

        Payment::insert([
            ['name' => 'ALI', 'slug' => 'ALI', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['name' => 'WEI', 'slug' => 'WEI', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ]);

        $channel->channelPayments()->create([
            'payment_id' => 1,
            "min_limit" => 1,
            'max_limit' => 5000,
            'amount_limit' => 5000000,
            'fee' => 0.1,
            'cost' => 0,
            'fee_type' => 'F',
            'deposit_fee' => 0.1,
            'deposit_cost' => 0,
            'deposit_fee_type' => 'F',
        ]);
        $channel->channelPayments()->create([
            'payment_id' => 2,
            "min_limit" => 1,
            'max_limit' => 5000,
            'amount_limit' => 5000000,
            'fee' => 0.1,
            'cost' => 0,
            'fee_type' => 'F',
            'deposit_fee' => 0.1,
            'deposit_cost' => 0,
            'deposit_fee_type' => 'F',
        ]);

    }
}
