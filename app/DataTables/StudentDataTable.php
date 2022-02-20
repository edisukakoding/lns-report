<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class StudentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.students.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Student::with('classRoom')->newQuery();
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
    #[ArrayShape(['nik' => "\Yajra\DataTables\Html\Column", 'name' => "\Yajra\DataTables\Html\Column", 'class_room' => "\Yajra\DataTables\Html\Column", 'gender' => "\Yajra\DataTables\Html\Column", 'is_kps' => "\Yajra\DataTables\Html\Column", 'is_pip' => "\Yajra\DataTables\Html\Column"])]
    public function getColumns(): array
    {
        $active     = '<i class="fas fa-check text-success"></i>';
        $inactive   = '<i class="fas fa-times text-danger"></i>';
        return [
            'nik' => new Column(['title' => __('models/students.fields.nik'), 'data' => 'nik']),
            'name' => new Column(['title' => __('models/students.fields.name'), 'data' => 'name']),
            'class_room' => new Column([
                'title' => __('models/classRooms.fields.name'),
                'data' => 'class_room',
                'render' => '`${data.name} ${data.description ? data.description : ""}`'
            ]),
            'gender' => new Column(['title' => __('models/students.fields.gender'), 'data' => 'gender']),
            'is_kps' => new Column([
                'title' => __('models/students.fields.is_kps'),
                'data' => 'is_kps',
                'render' => "data ? '$active' : '$inactive'"
            ]),
            'is_pip' => new Column([
                'title' => __('models/students.fields.is_pip'),
                'data' => 'is_pip',
                'render' => "data ? '$active' : '$inactive'"
            ]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Siswa ' . time();
    }
}
