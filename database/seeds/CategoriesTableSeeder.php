<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array(
            0 =>
                array(
                    'id'          => 1,
                    'parent_id'   => 0,
                    'post_count'  => 0,
                    'weight'      => 100,
                    'name'        => '公告',
                    'slug'        => 'notice',
                    'description' => '社团公告~',
                    'created_at'  => '2017-10-06 10:00:00',
                    'updated_at'  => '2017-10-06 10:00:00',
                    'deleted_at'  => null,
                ),
            1 =>
                array(
                    'id'          => 2,
                    'parent_id'   => 0,
                    'post_count'  => 0,
                    'weight'      => 99,
                    'name'        => '活动',
                    'slug'        => 'activity',
                    'description' => '社区举办的活动通知~',
                    'created_at'  => '2017-10-06 10:00:00',
                    'updated_at'  => '2017-10-06 10:00:00',
                    'deleted_at'  => null,
                ),
            2 =>
                array(
                    'id'          => 3,
                    'parent_id'   => 0,
                    'post_count'  => 0,
                    'weight'      => 98,
                    'name'        => '问答',
                    'slug'        => 'qa',
                    'description' => '新手问答~ 请文明规范！',
                    'created_at'  => '2017-10-06 10:00:00',
                    'updated_at'  => '2017-10-06 10:00:00',
                    'deleted_at'  => null,
                ),
            3 =>
                array(
                    'id'          => 4,
                    'parent_id'   => 0,
                    'post_count'  => 0,
                    'weight'      => 97,
                    'name'        => '分享',
                    'slug'        => 'share',
                    'description' => '分享美好~',
                    'created_at'  => '2017-10-06 10:00:00',
                    'updated_at'  => '2017-10-06 10:00:00',
                    'deleted_at'  => null,
                ),
            4 =>
                array(
                    'id'          => 5,
                    'parent_id'   => 0,
                    'post_count'  => 0,
                    'weight'      => 96,
                    'name'        => '普通',
                    'slug'        => 'simple',
                    'description' => '普通讨论帖~',
                    'created_at'  => '2017-10-06 10:00:00',
                    'updated_at'  => '2017-10-06 10:00:00',
                    'deleted_at'  => null,
                ),
        ));

//        article_categories
        \DB::table('article_categories')->delete();
        \DB::table('article_categories')->insert(array(
            0 =>
                array(
                    'id'          => 1,
                    'parent_id'   => 0,
                    'article_count'  => 0,
                    'weight'      => 100,
                    'name'        => '活动',
                    'slug'        => 'activity',
                    'description' => '参与活动的文章~',
                    'created_at'  => '2017-10-08 10:00:00',
                    'updated_at'  => '2017-10-08 10:00:00',
                    'deleted_at'  => null,
                ),
            1 =>
                array(
                    'id'          => 2,
                    'parent_id'   => 0,
                    'article_count'  => 0,
                    'weight'      => 99,
                    'name'        => '小说',
                    'slug'        => 'novel',
                    'description' => '展示自己平时写的小说~',
                    'created_at'  => '2017-10-08 10:00:00',
                    'updated_at'  => '2017-10-08 10:00:00',
                    'deleted_at'  => null,
                ),
            2 =>
                array(
                    'id'          => 3,
                    'parent_id'   => 0,
                    'article_count'  => 0,
                    'weight'      => 98,
                    'name'        => '科普',
                    'slug'        => 'science',
                    'description' => '提高知♂识水平的科普类文章~',
                    'created_at'  => '2017-10-08 10:00:00',
                    'updated_at'  => '2017-10-08 10:00:00',
                    'deleted_at'  => null,
                ),
            3 =>
                array(
                    'id'          => 4,
                    'parent_id'   => 0,
                    'article_count'  => 0,
                    'weight'      => 97,
                    'name'        => '教程',
                    'slug'        => 'tutorial',
                    'description' => '教程文章请存放在此分类下，转载文章请注明「转载于」声明。',
                    'created_at'  => '2017-10-08 10:00:00',
                    'updated_at'  => '2017-10-08 10:00:00',
                    'deleted_at'  => null,
                ),
        ));
    }
}
