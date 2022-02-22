<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Builder;

class HelperDataTable
{
    /**
     * @param object $object
     * @param bool $buttons
     * @param bool $searching
     * @param bool $paging
     * @return Builder
     */
    public static function builder(object $object, bool $buttons = true, bool $searching = true, bool $paging = true) : Builder
    {
        $config = [
            'searching' => false,
            'stateSave' => true,
            'paging'    => false,
            'bInfo'     => false,
            'order'     => [[0, 'desc']],
            'language'  => __('datatables.id'),
        ];

        if($buttons) {
            $config['dom']      = 'Bfrtip';
            $config['buttons']  = [
                [
                    'extend'    => 'excel',
                    'className' => 'btn btn-success btn-sm no-corner mr-1',
                    'text'      => '<i class="fa fa-file-excel"></i> ' .__('auth.app.excel')
                ],
                [
                    'extend'    => 'print',
                    'className' => 'btn btn-info btn-sm no-corner mr-1',
                    'text'      => '<i class="fa fa-print"></i> ' .__('auth.app.print')
                ],
                [
                    'extend'    => 'reload',
                    'className' => 'btn btn-warning btn-sm no-corner mr-1',
                    'text'      => '<i class="fa fa-sync"></i> ' .__('auth.app.reload')
                ],
            ];
        }

        if($searching) {
            $config['searching']    = true;
        }

        if($paging) {
            $config['paging']       = true;
            $config['bInfo']        = true;
        }

        return $object->builder()
            ->columns($object->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action'), 'class' => 'text-center'])
            ->parameters($config);
    }

    /**
     * @return string
     */
    public static function renderJSDate(): string
    {
        return 'new Date(data).toLocaleDateString("id-ID", {
            weekday: "long",
            year: "numeric",
             month: "long",
             day: "numeric"
        })';
    }

    /**
     * @return string
     */
    public static function formatIDR(): string
    {
        return 'new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(data)';
    }
}
