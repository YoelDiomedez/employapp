<?php

use App\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'dni'              => '76299297',
            'name'             => 'YOEL DIOMEDEZ',
            'paternal_surname' => 'ROMERO',
            'maternal_surname' => 'ALMONTE',
            'birth_date'       => '1995-10-06',
            'gender'           => 'M',
            'email'            => 'yoeldiomedez@gmail.com',
            'password'         => bcrypt('secret'),
        ]);

        $user->roles()->sync([1]);
    }
}
