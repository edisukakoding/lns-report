<?php

namespace App\DataTables;

use App\Models\Personal;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PersonalDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.personals.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Personal $model
     * @return Builder
     */
    public function query(Personal $model): Builder
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
        return HelperDataTable::builder($this);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    #[ArrayShape(['firstname' => "\Yajra\DataTables\Html\Column", 'address' => "\Yajra\DataTables\Html\Column", 'birthplace' => "\Yajra\DataTables\Html\Column", 'birthdate' => "\Yajra\DataTables\Html\Column", 'phone' => "\Yajra\DataTables\Html\Column"])] public function getColumns():array
    {
        return [
            'firstname' => new Column([
                'title' => __('models/personals.fields.firstname'),
                'data' => 'firstname',
                'render' => '`${full.firstname} ${full.lastname ? full.lastname : ""}`'
            ]),
            'address' => new Column(['title' => __('models/personals.fields.address'), 'data' => 'address']),
            'birthplace' => new Column([
                'title' => __('models/personals.fields.birthplace'),
                'data' => 'birthplace'
            ]),
            'birthdate' => new Column([
                'title' => __('models/personals.fields.birthdate'),
                'data' => 'birthdate',
                'render' => 'new Date(data).toLocaleDateString("id-ID", {
                    weekday: "long",
                    year: "numeric",
                     month: "long",
                     day: "numeric"
                })'
            ]),
            'phone' => new Column(['title' => __('models/personals.fields.phone'), 'data' => 'phone']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'personals_datatable_' . time();
    }
}
