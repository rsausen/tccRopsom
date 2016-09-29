<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => "ropsom",
            'email' => 'r.sausen@ymail.com',
            'password' => bcrypt('123'),
        ]);

        $this->call('EstadosTableSeeder');
        $this->call('CidadesTableSeeder');
    }
}
