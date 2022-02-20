<?php

namespace App\DataTables;

use App\Models\Guard;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class GuardDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.guards.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Guard::with('student')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return HelperDataTable::builder($this);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    #[ArrayShape(['type' => "\Yajra\DataTables\Html\Column", 'name' => "\Yajra\DataTables\Html\Column", 'student' => "\Yajra\DataTables\Html\Column", 'birthyear' => "\Yajra\DataTables\Html\Column", 'graduates' => "\Yajra\DataTables\Html\Column", 'job' => "\Yajra\DataTables\Html\Column", 'income' => "\Yajra\DataTables\Html\Column"])] public function getColumns(): array
    {
        return [
            'type' => new Column(['title' => __('models/guards.fields.type'), 'data' => 'type']),
            'name' => new Column(['title' => __('models/guards.fields.name'), 'data' => 'name']),
            'student' => new Column(['title' => __('models/guards.fields.student_id'), 'data' => 'student.name']),
            'birthyear' => new Column(['title' => __('models/guards.fields.birthyear'), 'data' => 'birthyear']),
            'graduates' => new Column(['title' => __('models/guards.fields.graduates'), 'data' => 'graduates']),
            'job' => new Column(['title' => __('models/guards.fields.job'), 'data' => 'job']),
            'income' => new Column(['title' => __('models/guards.fields.income'), 'data' => 'income']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'guards_datatable_' . time();
    }
}
