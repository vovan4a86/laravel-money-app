<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        /*
        DB::table('income_types')
            ->insert(['type_name' => 'Зарплата']);

        DB::table('income_types')
            ->insert(['type_name' => 'Шабашка']);

        DB::table('outcome_types')
            ->insert(['type_name' => 'Транспорт']);

        DB::table('outcome_types')
            ->insert(['type_name' => 'Питание']);

        //-------------------------------

        DB::table('incomes')->insert([
            'type_id' => 1,
            'comment' => 'Получка была',
            'amount' => 20000,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('incomes')->insert([
            'type_id' => 2,
            'comment' => 'Таксонул',
            'amount' => 1000,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('outcomes')->insert([
            'type_id' => 1,
            'comment' => 'Бензин',
            'amount' => 900,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('outcomes')->insert([
            'type_id' => 2,
            'comment' => 'Шаурма',
            'amount' => 120,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        */

        DB::table('payment_types')
            ->insert(['is_income' => 1,'type_name' => 'Зарплата']);

        DB::table('payment_types')
            ->insert(['is_income' => 1, 'type_name' => 'Шабашка']);

        DB::table('payment_types')
            ->insert(['is_income' => 0, 'type_name' => 'Транспорт']);

        DB::table('payment_types')
            ->insert(['is_income' => 0, 'type_name' => 'Питание']);

        //--------------------

        DB::table('payments')->insert([
            'is_income' => 1,
            'type_id' => 1,
            'amount' => 20000,
            'comment' => 'Получка была',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('payments')->insert([
            'is_income' => 1,
            'type_id' => 2,
            'amount' => 1000,
            'comment' => 'Таксонул',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('payments')->insert([
            'is_income' => 0,
            'type_id' => 3,
            'amount' => 2000,
            'comment' => 'Бензин в тачку',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('payments')->insert([
            'is_income' => 0,
            'type_id' => 4,
            'amount' => 200,
            'comment' => 'Шаурма на вокзале',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
