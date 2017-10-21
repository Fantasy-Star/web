<?php

namespace App\Admin\Controllers;

use App\Models\Role;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RoleController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Role::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name','用户名');
            $grid->column('year','年代');
            $grid->column('position','职位');
            $grid->column('user_id','UID');
            $grid->column('description','描述');

//            $grid->created_at();
//            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Role::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->number('year','年代');
            $form->text('name','用户名');
            $form->text('title','称号');
            $form->text('nickname','昵称');
            $form->text('position','职位');
            $form->number('department','部门');
            $form->number('user_id','UID');
            $form->text('description','描述');
//            $form->display('created_at', 'Created At');
//            $form->display('updated_at', 'Updated At');
        });
    }
}
