<?php

namespace App\DataTables;

use App\Models\AnecdoteEvaluationDetail;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AnecdoteEvaluationDetailDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.anecdote_evaluation_details.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param AnecdoteEvaluationDetail $model
     * @return Builder
     */
    public function query(AnecdoteEvaluationDetail $model): Builder
    {
        return $model::with('student')->newQuery();
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
        'anecdote_evaluation_id' => "\Yajra\DataTables\Html\Column",
        'location' => "\Yajra\DataTables\Html\Column",
        'time' => "\Yajra\DataTables\Html\Column",
        'student_id' => "\Yajra\DataTables\Html\Column",
        'incident' => "\Yajra\DataTables\Html\Column",
    ])]
    public function getColumns(): array
    {
        return [
            'student_id' => new Column([
                'title' => __('models/anecdoteEvaluationDetails.fields.student_id'),
                'data' => 'student_id',
                'render' => 'full.student.name'
            ]),
            'location' => new Column(['title' => __('models/anecdoteEvaluationDetails.fields.location'), 'data' => 'location']),
            'time' => new Column([
                'title' => __('models/anecdoteEvaluationDetails.fields.time'),
                'data' => 'time',
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
        return 'Catatan Anekdot Anak ' . time();
    }
}
