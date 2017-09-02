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
        $user->gender = 'male';
        $user->real_name = '云游君';
        $user->department = '3';
        $user->city = '江苏省连云港市';
        $user->major = '计算机科学与技术';
        $user->class = '计算机141';
        $user->tel = '15000985609';
        $user->weibo_name = '机智的云游君';
        $user->weibo_link = 'http://weibo.com/jizhideyunyoujun';
        $user->personal_website = 'yunyoujun.cn';
        $user->qq = '910426929';
        $user->wechat = 'QQ910426929';
        $user->introduction = 'All at sea.';

        $user->is_admin = true;
        $user->verified = 1;
        $user->activated = true;
        $user->save();
    }
}
