<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'active' => 'yes',
            'role'=> 'admin',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        

        DB::table('settings')->insert([
            'name' => 'invoice_tax',
            'data' => 'INCOMPLETE BUSINESS PROFILE - INVOICE-TAX-RATE',
            'group' => 'tax',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('invoice_settings')->insert([
            'name' => 'PENDING',
            'group' => 'status',
            'color' => 'secondary',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('invoice_settings')->insert([
            'name' => 'OVERDUE',
            'group' => 'status',
            'color' => 'danger',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('invoice_settings')->insert([
            'name' => 'PAID',
            'group' => 'status',
            'color' => 'success',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('settings')->insert([
            'name' => 'language',
            'data' => 'en',
            'group' => 'language',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $this->call([
            BusinessProfileSeeder::class,
        ]);




    }
}
