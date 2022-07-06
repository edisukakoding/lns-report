<?php

namespace App\DataTables;

use App\Models\GeneralSetting;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class GeneralSettingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'general_settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\GeneralSetting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GeneralSetting $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'paud_name' => new Column(['title' => __('models/generalSettings.fields.paud_name'), 'data' => 'paud_name']),
            'paud_address' => new Column(['title' => __('models/generalSettings.fields.paud_address'), 'data' => 'paud_address']),
            'paud_phone_number' => new Column(['title' => __('models/generalSettings.fields.paud_phone_number'), 'data' => 'paud_phone_number']),
            'paud_fax' => new Column(['title' => __('models/generalSettings.fields.paud_fax'), 'data' => 'paud_fax']),
            'paud_telephone' => new Column(['title' => __('models/generalSettings.fields.paud_telephone'), 'data' => 'paud_telephone']),
            'paud_email' => new Column(['title' => __('models/generalSettings.fields.paud_email'), 'data' => 'paud_email']),
            'paud_website' => new Column(['title' => __('models/generalSettings.fields.paud_website'), 'data' => 'paud_website']),
            'head_of_paud' => new Column(['title' => __('models/generalSettings.fields.head_of_paud'), 'data' => 'head_of_paud'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'general_settings_datatable_' . time();
    }
}
