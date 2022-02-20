<?php

namespace App\DataTables;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ClassRoomDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.class_rooms.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param ClassRoom $model
     * @return Builder
     */
    public function query(ClassRoom $model): Builder
    {
        return $model->newQuery();
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
    #[ArrayShape(['name' => "\Yajra\DataTables\Html\Column", 'description' => "\Yajra\DataTables\Html\Column"])] public function getColumns()
    {
        return [
            'name' => new Column(['title' => __('models/classRooms.fields.name'), 'data' => 'name']),
            'description' => new Column(['title' => __('models/classRooms.fields.description'), 'data' => 'description'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Kelas' . time();
    }
}
