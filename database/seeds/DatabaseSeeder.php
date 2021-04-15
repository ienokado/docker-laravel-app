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
        // $this->call(UsersTableSeeder::class);
        $this->call(DebayashisTableSeeder::class);
        $this->call(ComedianGroupsTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
    }
}
