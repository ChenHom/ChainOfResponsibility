<?php

use App\CashBookRecord;
use App\Entities\CashBook;
use Illuminate\Database\Seeder;

class CashBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cash_book')->truncate();
        \DB::table('cash_book_record')->truncate();

        $c = CashBook::create([
            'user_id' => 4,
            'amount' => 50000,
        ]);
        CashBookRecord::create([
            'cash_book_id' => 1,
            'original_amount' => 0,
            'diff_amount' => $c->amount,
            'source_id' => 1,
            'type' => 'R'
        ]);
    }
}
