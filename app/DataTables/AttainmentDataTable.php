<?php

namespace App\DataTables;

use App\Models\Attainment;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AttainmentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.attainments.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        $model = Attainment::with('user.personal', 'classRoom');
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder
    {
        return HelperDataTable::builder(object: $this);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    #[ArrayShape([
        'class_room_id' => "\Yajra\DataTables\Html\Column",
        'user_id' => "\Yajra\DataTables\Html\Column",
        'date' => "\Yajra\DataTables\Html\Column"
    ])]
    public function getColumns(): array
    {
        return [
            'class_room_id' => new Column([
                'title' => __('models/attainments.fields.class_room_id'),
                'data' => 'class_room_id',
                'render' => 'full.class_room.name',
            ]),
            'user_id' => new Column([
                'title' => __('models/attainments.fields.user_id'),
                'data' => 'user_id',
                'render' => '`${full.user.personal ? full.user.personal.firstname : full.user.name} ${full.user.personal && full.user.personal.lastname ? full.user.personal.lastname : ""}`',
            ]),
            'date' => new Column([
                'title' => __('models/attainments.fields.date'),
                'data' => 'date',
                'render' => HelperDataTable::renderJSDate()
            ])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Hasil Karya ' . time();
    }
}
