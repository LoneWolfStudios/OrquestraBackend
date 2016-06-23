<?php

use Illuminate\Database\Seeder;

use Orquestra\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        
        $user->name = "Diego Rodrigues";
        $user->email = "diego.mrodrigues@outlook.com";
        $user->password = bcrypt("senha");
        
        $user->save();
    }
}
