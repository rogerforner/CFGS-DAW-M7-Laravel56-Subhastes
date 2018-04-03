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
            'nickname' => 'farruquito_69',
            'name'     => 'admin',
            'surname'  => 'adminSurname',
            'email'    => 'admin@example.com',
            'password' => bcrypt('123456'),
        ]);

        $modUser = User::create([
            'nickname' => 'LeoMessi_Official',
            'name'     => 'auctionManager',
            'surname'  => 'ManagerSurname',
            'email'    => 'auctionManager@example.com',
            'password' => bcrypt('123456'),
        ]);

        $User = User::create([
            'nickname' => 'CR7_BalonDePlaya',
            'name'     => 'user',
            'surname'  => 'userSurname',
            'email'    => 'user@example.com',
            'password' => bcrypt('123456'),
        ]);


        // Assignar rols.
        $adminUser->assignRole('admin');
        $modUser->assignRole('auctionManager');
        $User->assignRole('user');
    }
}
