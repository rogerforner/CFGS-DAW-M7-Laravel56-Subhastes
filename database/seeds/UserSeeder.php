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
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => '123456',
        ]);

        $modUser = User::create([
            'name'     => 'auctionManager',
            'email'    => 'auctionManager@example.com',
            'password' => bcrypt('123456'),
        ]);

        $User = User::create([
            'name'     => 'user',
            'email'    => 'user@example.com',
            'password' => bcrypt('123456'),
        ]);


        // Assignar rols.
        $adminUser->assignRole('admin');
        $modUser->assignRole('auctionManager');
        $User->assignRole('user');
    }
}
