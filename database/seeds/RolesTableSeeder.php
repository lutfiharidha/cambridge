<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add role
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administration',
                'description' => 'Only one and only admin',
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Registed Teacher',
                'description' => 'Access for registed teacher',
            ],
            [
                'name' => 'student',
                'display_name' => 'Registed Student',
                'description' => 'Access for registed student',
            ],
        ];
foreach ($roles as $key => $value) {
            Role::create($value);
        }
//add user
        $users = [
            [
                'name' => 'admin1',
                'email' => 'admin1@local.local',
                'password' => bcrypt('admin1'),
            ],
            [
                'name' => 'teacher',
                'email' => 'teacher@local.local',
                'password' => bcrypt('teacher'),
            ],
            [
                'name' => 'student',
                'email' => 'student@local.local',
                'password' => bcrypt('student'),
            ],
        ];
        $n=1;
        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }
    }
}