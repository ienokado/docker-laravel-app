<?php

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 管理者ユーザーの作成
        $admin = new AdminUser();
        $admin->name = "admin";
        $admin->email = 'admin@example.com';
        $admin->password = password_hash('debayashikoreyashi', PASSWORD_DEFAULT);
        $admin->save();
    }
}
