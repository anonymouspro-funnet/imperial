<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'general',
            'email' => 'general@imperial.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('spacecrafts')->insert([
            'name' => 'Devastator',
            'class' => 'Star Destroyer',
            'crew' => '35000',
            'image' => 'dv.png',
            'value' => '1999.99',
            'status' => 'operational',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('spacecrafts')->insert([
            'name' => 'Red Five',
            'class' => 'Star Destroyer',
            'crew' => '15000',
            'image' => 'rf.png',
            'value' => '466.99',
            'status' => 'damaged',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('spacecraft_armaments')->insert([
            'spacecraft_id' => '1',
            'title' => 'Turbo Laser',
            'qty' => '60',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('spacecraft_armaments')->insert([
            'spacecraft_id' => '1',
            'title' => 'Ion Cannons',
            'qty' => '60',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('spacecraft_armaments')->insert([
            'spacecraft_id' => '1',
            'title' => 'Tractor Beam',
            'qty' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
