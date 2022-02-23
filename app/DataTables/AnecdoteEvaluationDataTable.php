<?php

namespace App\DataTables;

use App\Models\AnecdoteEvaluation;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AnecdoteEvaluationDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.anecdote_evaluations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param AnecdoteEvaluation $model
     * @return Builder
     */
    public function query(AnecdoteEvaluation $model): Builder
    {
        return $model::with(['user.personal', 'classRoom'])->newQuery();
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
    #[ArrayShape(['class_room_id' => "\Yajra\DataTables\Html\Column", 'user_id' => "\Yajra\DataTables\Html\Column", 'date' => "\Yajra\DataTables\Html\Column"])]
    public function getColumns(): array
    {
        return [
            'class_room_id' => new Column([
                'title'     => __('models/anecdoteEvaluations.fields.class_room_id'),
                'data'      => 'class_room_id',
                'render'    => '`${full.class_room.name} ${full.class_room.description ?? ""}`'
            ]),
            'user_id' => new Column([
                'title'     => __('models/anecdoteEvaluations.fields.user_id'),
                'data'      => 'user_id',
                'render'    => '`${full.user.personal.firstname} ${full.user.personal.lastname ?? ""}`'
            ]),
            'date' => new Column([
                'title'     => __('models/anecdoteEvaluations.fields.date'),
                'data'      => 'date',
                'render'    => HelperDataTable::renderJSDate()
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
        return 'Catatan Anekdot ' . time();
    }
}
