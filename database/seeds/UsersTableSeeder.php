<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->stu_id = '201410311072';
        $user->name = 'YunYouJun';
        $user->email = '910426929@qq.com';
        $user->password = bcrypt('yunyou');
        $user->academy = '03';
        $user->gender = '♂';

        $user->is_admin = true;
        $user->verified = 1;
        $user->activated = true;
        $user->save();
    }
}
