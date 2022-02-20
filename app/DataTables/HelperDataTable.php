<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Builder;

class HelperDataTable
{
    public static function builder(object $object) : Builder
    {
        return $object->builder()
            ->columns($object->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action'), 'class' => 'text-center'])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-success btn-sm no-corner mr-1',
                        'text' => '<i class="fa fa-file-excel"></i> ' .__('auth.app.excel')
                    ],
                    [
                        'extend' => 'print',
                        'className' => 'btn btn-info btn-sm no-corner mr-1',
                        'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print')
                    ],
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-warning btn-sm no-corner mr-1',
                        'text' => '<i class="fa fa-sync"></i> ' .__('auth.app.reload')
                    ],
                ],
                'language' => __('datatables.id'),
            ]);
    }
}
