<?php

namespace App\DataTables;

use App\Models\Report;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ReportDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return (new EloquentDataTable($query))->addColumn('action', 'teacher.reports.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Report $model
     * @return Builder
     */
    public function query(Report $model): Builder
    {
        return $model->with('user.personal', 'student.classRoom')->newQuery();
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
    #[ArrayShape([
        'student_id' => Column::class,
        'aspect.category' => Column::class,
        'aspect.subcategory' => Column::class,
        'aspect.point' => Column::class,
        'user_id' => Column::class,
        'value' => Column::class
    ])] public function getColumns(): array
    {
        return [
            'student_id' => new Column([
                'title' => __('models/reports.fields.student_id'),
                'data' => 'student_id',
                'render' => '`${full.student.name} ( Kelas ${full.student.class_room.name} )`'
            ]),
            'aspect.category' => new Column([
                'title' => __('models/aspectSettings.fields.category'),
                'data' => 'aspect',
                'render' => '((data, type, full, meta) => {
                    let json = data.replace(/&quot;/g, `\\"`);
                    let aspect = JSON.parse(json);
                    return aspect.category;
                })(data, type, full, meta)'
            ]),'aspect.subcategory' => new Column([
                'title' => __('models/aspectSettings.fields.subcategory'),
                'data' => 'aspect',
                'render' => '((data, type, full, meta) => {
                    let json = data.replace(/&quot;/g, `\\"`);
                    let aspect = JSON.parse(json);
                    return aspect.subcategory;
                })(data, type, full, meta)'
            ]),
            'aspect.point' => new Column([
                'title' => __('models/reports.fields.aspect'),
                'data' => 'aspect',
                'render' => '((data, type, full, meta) => {
                    let json = data.replace(/&quot;/g, `\\"`);
                    let aspect = JSON.parse(json);
                    return aspect.point;
                })(data, type, full, meta)'
            ]),
            'user_id' => new Column([
                'title' => __('models/reports.fields.user_id'),
                'data' => 'user_id',
                'render' => 'full.user.personal.firstname'
            ]),
            'value' => new Column([
                'title' => __('models/reports.fields.value'),
                'data' => 'value',
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
        return 'Asesmen ' . time();
    }
}
