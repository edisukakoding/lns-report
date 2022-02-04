<?php

namespace App\DataTables;

use App\Models\AnecdoteEvaluationDetail;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AnecdoteEvaluationDetailDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'anecdot_evaluation_details.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AnecdoteEvaluation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AnecdoteEvaluationDetail $model)
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
            'anecdot_evaluation_id' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.anecdot_evaluation_id'), 'data' => 'anecdot_evaluation_id']),
            'location' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.location'), 'data' => 'location']),
            'time' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.time'), 'data' => 'time']),
            'student_id' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.student_id'), 'data' => 'student_id']),
            'incident' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.incident'), 'data' => 'incident']),
            'basic_competencies' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.basic_competencies'), 'data' => 'basic_competencies']),
            'achievements' => new Column(['title' => __('models/anecdotEvaluationDetails.fields.achievements'), 'data' => 'achievements'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'anecdot_evaluation_details_datatable_' . time();
    }
}
