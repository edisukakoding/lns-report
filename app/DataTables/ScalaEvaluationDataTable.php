<?php

namespace App\DataTables;

use App\Models\ScalaEvaluation;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ScalaEvaluationDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.scala_evaluations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return ScalaEvaluation::with('student.classRoom', 'teacher')->newQuery();
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
        'date' => "\Yajra\DataTables\Html\Column",
        'student' => "\Yajra\DataTables\Html\Column",
        'indicator' => "\Yajra\DataTables\Html\Column"
    ])]
    public function getColumns(): array
    {
        return [
            'date' => new Column([
                'title' => __('models/scalaEvaluations.fields.date'),
                'data' => 'date',
                'render' => 'new Date(data).toLocaleDateString("id-ID", {
                    weekday: "long",
                    year: "numeric",
                     month: "long",
                     day: "numeric"
                })'
            ]),
            'student' => new Column([
                'title' => __('models/scalaEvaluations.fields.student_id'),
                'data' => 'student',
                'render' => '`${data.name} ( Kelas ${data.class_room.name} )`'
            ]),
            'indicator' => new Column(['title' => __('models/scalaEvaluations.fields.indicator'), 'data' => 'indicator']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Evaluasi Skala' . time();
    }
}
