<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;

class BookExcelExporter extends AbstractExporter
{
    public function export()
    {
        Excel::create('社团藏书', function($excel) {

            $excel->sheet('书单1', function($sheet) {

                // 这段逻辑是从表格数据中取出需要导出的字段
                $rows = collect($this->getData())->map(function ($item) {
                    return array_only($item, ['id', 'name', 'isbn', 'author', 'publisher', 'pub_date', 'price', 'total', 'douban_score', 'note', 'description', 'recommend', 'cid', 'tags', 'book_pic', 'user_id', 'created_at', 'updated_at']);
                });

                $sheet->prependRow(array(
                    'id', 'name', 'isbn', 'author', 'publisher', 'pub_date', 'price', 'total', 'douban_score', 'note', 'description', 'recommend', 'cid', 'tags', 'book_pic', 'user_id', 'created_at', 'updated_at'
                ));
                $sheet->rows($rows);

            });

        })->export('xls');
    }
}