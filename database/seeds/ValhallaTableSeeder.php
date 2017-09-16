<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class ValhallaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('valhalla')->delete();
        \DB::table('valhalla')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'year' => 2014,
                    'name' => '林绍鹏',
                    'position' => '社长',
                    'department' => 0,
                    'user_id' => null,
                    'description' => '中二病患者',
                ),
            1 =>
                array(
                    'id' => 2,
                    'year' => 2014,
                    'name' => '张佳林',
                    'position' => '小说部部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            2 =>
                array(
                    'id' => 3,
                    'year' => 2014,
                    'name' => '殷学睿',
                    'position' => '电影部部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            3 =>
                array(
                    'id' => 4,
                    'year' => 2014,
                    'name' => '吴岳',
                    'position' => '科技部部长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            4 =>
                array(
                    'id' => 5,
                    'year' => 2014,
                    'name' => '喻舒豪',
                    'position' => '外联部部长',
                    'department' => 4,
                    'user_id' => null,
                    'description' => '',
                ),
            5 =>
                array(
                    'id' => 6,
                    'year' => 2014,
                    'name' => '丁永超',
                    'position' => '外联部部长',
                    'department' => 4,
                    'user_id' => null,
                    'description' => '林绍鹏：工作能力超级吊。',
                ),
            6 =>
                array(
                    'id' => 7,
                    'year' => 2014,
                    'name' => '梁思飞',
                    'position' => '小说部副部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            7 =>
                array(
                    'id' => 8,
                    'year' => 2014,
                    'name' => '张溯瞻',
                    'position' => '电影部副部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            8 =>
                array(
                    'id' => 9,
                    'year' => 2014,
                    'name' => '刘剑芸',
                    'position' => '网宣负责人',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '林绍鹏：幻星一姐，声音敲可爱的网宣第一任负责人。',
                ),
            9 =>
                array(
                    'id' => 10,
                    'year' => 2014,
                    'name' => '王颖',
                    'position' => '幻想节迎宾',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            10 =>
                array(
                    'id' => 11,
                    'year' => 2015,
                    'name' => '曲锦雄',
                    'position' => '社长',
                    'department' => 0,
                    'user_id' => null,
                    'description' => '',
                ),
            11 =>
                array(
                    'id' => 12,
                    'year' => 2015,
                    'name' => '周佳驰',
                    'position' => '副社长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            12 =>
                array(
                    'id' => 13,
                    'year' => 2015,
                    'name' => '杨一苇',
                    'position' => '小说部部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            13  =>
                array(
                    'id' => 14,
                    'year' => 2015,
                    'name' => '李蔓',
                    'position' => '电影部部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            14 =>
                array(
                    'id' => 15,
                    'year' => 2015,
                    'name' => '杨睿',
                    'position' => '科技部部长',
                    'department' => 3,
                    'user_id' => 1,
                    'description' => '网站开发者兼管理员',
                ),
            15 =>
                array(
                    'id' => 16,
                    'year' => 2015,
                    'name' => '杨越庭',
                    'position' => '小说部副部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            16 =>
                array(
                    'id' => 17,
                    'year' => 2015,
                    'name' => '无',
                    'position' => '电影部副部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            17 =>
                array(
                    'id' => 18,
                    'year' => 2015,
                    'name' => '杨昊霖',
                    'position' => '科技部副部长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            18 =>
                array(
                    'id' => 19,
                    'year' => 2015,
                    'name' => '陈晶苗',
                    'position' => '网宣负责人',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            19 =>
                array(
                    'id' => 20,
                    'year' => 2016,
                    'name' => '赵鸿飞',
                    'position' => '社长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            20 =>
                array(
                    'id' => 21,
                    'year' => 2016,
                    'name' => '冷庐逸',
                    'position' => '副社长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            21 =>
                array(
                    'id' => 22,
                    'year' => 2016,
                    'name' => '周瑞',
                    'position' => '副社长 & 吉祥物',
                    'department' => 0,
                    'user_id' => null,
                    'description' => '',
                ),
            22 =>
                array(
                    'id' => 23,
                    'year' => 2016,
                    'name' => '赵鹤庭',
                    'position' => '小说部部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '“许愿弓呆”',
                ),
            23 =>
                array(
                    'id' => 24,
                    'year' => 2016,
                    'name' => '李一丁',
                    'position' => '电影部部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            24 =>
                array(
                    'id' => 25,
                    'year' => 2016,
                    'name' => '刘璐',
                    'position' => '科技部部长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            25 =>
                array(
                    'id' => 26,
                    'year' => 2016,
                    'name' => '季元达',
                    'position' => '外联部部长',
                    'department' => 4,
                    'user_id' => null,
                    'description' => '',
                ),
            26 =>
                array(
                    'id' => 27,
                    'year' => 2016,
                    'name' => '陆思遐',
                    'position' => '行政部部长',
                    'department' => 5,
                    'user_id' => null,
                    'description' => '',
                ),
            27 =>
                array(
                    'id' => 28,
                    'year' => 2016,
                    'name' => '张弛',
                    'position' => '小说部副部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            28 =>
                array(
                    'id' => 29,
                    'year' => 2016,
                    'name' => '罗森',
                    'position' => '电影部副部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            29 =>
                array(
                    'id' => 30,
                    'year' => 2016,
                    'name' => '沈曦',
                    'position' => '科技部副部长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
            30 =>
                array(
                    'id' => 31,
                    'year' => 2016,
                    'name' => '真学超',
                    'position' => '外联部副部长',
                    'department' => 4,
                    'user_id' => null,
                    'description' => '',
                ),
            31 =>
                array(
                    'id' => 32,
                    'year' => 2016,
                    'name' => '诸易',
                    'position' => '行政部副部长',
                    'department' => 5,
                    'user_id' => null,
                    'description' => '',
                ),
            32 =>
                array(
                    'id' => 33,
                    'year' => 2017,
                    'name' => '龚逸文',
                    'position' => '社长',
                    'department' => 0,
                    'user_id' => null,
                    'description' => '<img src="http://media.yunyoujun.cn/FantasyStar/img/valhalla/杀异性.png" alt="大楚：“杀异性”">',
                ),
            33 =>
                array(
                    'id' => 34,
                    'year' => 2017,
                    'name' => '李梓华',
                    'position' => '副社长',
                    'department' => 0,
                    'user_id' => null,
                    'description' => '',
                ),
            34 =>
                array(
                    'id' => 35,
                    'year' => 2017,
                    'name' => '王蒙',
                    'position' => '副社长',
                    'department' => 0,
                    'user_id' => null,
                    'description' => '',
                ),
            35 =>
                array(
                    'id' => 36,
                    'year' => 2017,
                    'name' => '苏征策',
                    'position' => '小说部部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            36 =>
                array(
                    'id' => 37,
                    'year' => 2017,
                    'name' => '冯煜藻',
                    'position' => '电影部部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            37 =>
                array(
                    'id' => 38,
                    'year' => 2017,
                    'name' => '张运',
                    'position' => '科技部部长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '根据某不知名算法计算，月零花钱大概在两千万左右。',
                ),
            38 =>
                array(
                    'id' => 39,
                    'year' => 2017,
                    'name' => '李汉卿',
                    'position' => '外联部部长',
                    'department' => 4,
                    'user_id' => null,
                    'description' => '',
                ),
            39 =>
                array(
                    'id' => 40,
                    'year' => 2017,
                    'name' => '林佳琰',
                    'position' => '行政部部长',
                    'department' => 5,
                    'user_id' => null,
                    'description' => '',
                ),
            40 =>
                array(
                    'id' => 41,
                    'year' => 2017,
                    'name' => '刘少雄',
                    'position' => '小说部副部长',
                    'department' => 1,
                    'user_id' => null,
                    'description' => '',
                ),
            41 =>
                array(
                    'id' => 42,
                    'year' => 2017,
                    'name' => '刘源',
                    'position' => '电影部副部长',
                    'department' => 2,
                    'user_id' => null,
                    'description' => '',
                ),
            42 =>
                array(
                    'id' => 43,
                    'year' => 2017,
                    'name' => '徐之辉',
                    'position' => '科技部副部长',
                    'department' => 3,
                    'user_id' => null,
                    'description' => '',
                ),
//continued ……
        ));
    }
}
