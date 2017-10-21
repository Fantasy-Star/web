<?php

namespace App\Admin\Controllers;

use App\Models\Book;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use App\Admin\Extensions\BookExcelExporter;

class BookController extends Controller
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

            $content->header('藏书');
            $content->description('管理');

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

            $content->header('编辑');
            $content->description('藏书信息');

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

            $content->header('新增');
            $content->description('藏书');

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
        return Admin::grid(Book::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name();
            $grid->isbn();
            $grid->author('作者');
            $grid->column('total','总数');
            $grid->column('note','备注');
            $grid->created_at();
            $grid->updated_at();

            $grid->exporter(new BookExcelExporter());

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Book::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','书本名称');
            $form->text('isbn','ISBN');
            $form->text('author','作者');
            $form->text('publisher','出版社');
            $form->date('pub_date','出版日期');
            $form->currency('price','价格')->symbol('￥');
            $form->number('total','总数');
            $form->text('note','备注');
            $form->ckeditor('description','内容描述');

            $form->tags('tags');
            $form->image('book_pic','封面图片');
            $form->number('user_id','当前保管者');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
