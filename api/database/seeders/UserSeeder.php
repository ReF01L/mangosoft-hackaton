<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        $user1 = User::create([
            'first_name' => 'User',
            'second_name' => 'Test',
            'username' => 'user1',
            'phone' => '+79995552020',
            'email' => 'example1@gmail.com',
            'password' => 'password',
        ]);

        $user2 = User::create([
            'first_name' => 'User',
            'second_name' => 'Test',
            'username' => 'user2',
            'phone' => '+79995552021',
            'email' => 'example2@gmail.com',
            'password' => 'password',
        ]);

        $user3 = User::create([
            'first_name' => 'User',
            'second_name' => 'Test',
            'username' => 'user3',
            'phone' => '+79995552022',
            'email' => 'example3@gmail.com',
            'password' => 'password',
        ]);

        Permission::create(['name' => 'Создание курсов']);
        Permission::create(['name' => 'Расписание']);

        $companyRole = Role::create(['name' => 'company']);
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

        $companyRole->givePermissionTo(Permission::where(['name' => 'Создание курсов'])->first());
        $teacherRole->givePermissionTo(Permission::where(['name' => 'Расписание'])->first());
        $studentRole->givePermissionTo(Permission::where(['name' => 'Расписание'])->first());

        $user1->givePermissionTo(Permission::all());
        $user2->givePermissionTo(Permission::where(['name' => 'Расписание'])->first());
        $user3->givePermissionTo(Permission::where(['name' => 'Расписание'])->first());

        $user1->assignRole($companyRole);
        $user1->assignRole($teacherRole);
        $user2->assignRole($teacherRole);
        $user3->assignRole($studentRole);

        $user1->save();
        $user2->save();
        $user3->save();
    }
}
