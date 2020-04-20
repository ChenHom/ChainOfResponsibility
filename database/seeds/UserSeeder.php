<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $users = [
            [
                'name' => 'hom-co',
                'alias' => 'hom-co',
                'password' => bcrypt('hom-co'),
                'role' => ROLE_CO,
                'parent_id' => 0,
                'co_id' => 0,
                'sa_id' => 0,
                'a_id' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'hom-sa',
                'alias' => 'hom-sa',
                'password' => bcrypt('hom-sa'),
                'role' => ROLE_SA,
                'parent_id' => 1,
                'co_id' => 1,
                'sa_id' => 0,
                'a_id' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'hom-a',
                'alias' => 'hom-a',
                'password' => bcrypt('hom-a'),
                'role' => ROLE_A,
                'parent_id' => 2,
                'co_id' => 1,
                'sa_id' => 2,
                'a_id' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        User::insert($users);
        $user = User::create([
            'name' => 'homtest',
            'alias' => 'homtest',
            'password' => bcrypt('homtest'),
            'role' => ROLE_M,
            'parent_id' => 3,
            'co_id' => 1,
            'sa_id' => 2,
            'a_id' => 3,
            'amount_limit' => 5000000,
            'secret_key' => hash_hmac('sha512', uniqid('homtest'), config('api.key')),
            'enable' => ENABLE_ON,
        ]);

        $user->userPayment()->create([
            'channel_payment_id' => 1,
            'co_p' => 0.2,
            'sa_p' => 0.3,
            'a_p' => 0.4,
            'fee' => 1.2,
            'cost' => 0,
            'fee_type' => 'F',
            'amount_limit' => 500000,
            'min_limit' => 1,
            'max_limit' => 5000,
        ]);
    }
}
