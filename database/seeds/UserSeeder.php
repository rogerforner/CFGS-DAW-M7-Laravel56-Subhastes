<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Configuració (.env).
        $name     = env('USER_ADMIN_NAME');
        $email    = env('USER_ADMIN_EMAIL');
        $password = env('USER_ADMIN_PASS');

        // Inserir usuaris.
        $adminUser = User::create([
            'nickname' => 'AdminNick',
            'name'     => 'admin',
            'surname'  => 'adminSurname',
            'email'    => 'admin@example.com',
            'password' => bcrypt('123456'),
            'verified' => true,
        ]);

        $modUser = User::create([
            'nickname' => 'AuctionManager',
            'name'     => 'auctionManager',
            'surname'  => 'ManagerSurname',
            'email'    => 'auctionManager@example.com',
            'password' => bcrypt('123456'),
            'verified' => true,
        ]);

        $User = User::create([
            'nickname' => 'CR7_BalonDePlaya',
            'name'     => 'user',
            'surname'  => 'userSurname',
            'email'    => 'user@example.com',
            'password' => bcrypt('123456'),
            'verified' => true,
        ]);


        // Assignar rols.
        $adminUser->assignRole('admin');
        $modUser->assignRole('auctionManager');
        $User->assignRole('user');
    }
}
