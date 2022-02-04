<?php

namespace App\DataTables;

use App\Models\Personal;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PersonalDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'personals.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Personal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Personal $model)
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
            'firstname' => new Column(['title' => __('models/personals.fields.firstname'), 'data' => 'firstname']),
            'lastname' => new Column(['title' => __('models/personals.fields.lastname'), 'data' => 'lastname']),
            'address' => new Column(['title' => __('models/personals.fields.address'), 'data' => 'address']),
            'birthdate' => new Column(['title' => __('models/personals.fields.birthdate'), 'data' => 'birthdate']),
            'birthplace' => new Column(['title' => __('models/personals.fields.birthplace'), 'data' => 'birthplace']),
            'phone' => new Column(['title' => __('models/personals.fields.phone'), 'data' => 'phone']),
            'graduates' => new Column(['title' => __('models/personals.fields.graduates'), 'data' => 'graduates']),
            'image' => new Column(['title' => __('models/personals.fields.image'), 'data' => 'image'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'personals_datatable_' . time();
    }
}
