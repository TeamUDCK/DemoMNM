<?php

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
        DB::table('qt64_users')->insert(
        [
        	[
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'level' => 1,
            'created_at' => new DateTime()
        	],
        	[
            'username' => 'master',
            'password' => bcrypt('12345'),
            'level' => 1,
            'created_at' => new DateTime()
        	],
        	[
            'username' => 'user',
            'password' => bcrypt('12345'),
            'level' => 1,
            'created_at' => new DateTime()
        	],
        ]
        );
    }
}
