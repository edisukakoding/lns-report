<?php

namespace App\DataTables;

use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class EvaluationDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return (new EloquentDataTable($query))->addColumn('action', 'teacher.evaluations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Evaluation $model
     * @return Builder
     */

    public function query(Evaluation $model): Builder
    {
        return $model::with([
            'user.personal',
            'scala.student.classRoom',
            'attainmentDetail.student.classRoom',
            'anecdoteEvaluationDetail.student.classRoom'
        ])->newQuery();
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
        'evaluation_type' => Column::class,
        'basic_competencies' => Column::class,
        'achievements' => Column::class,
        'user_id' => Column::class,
        'evaluation_id' => Column::class,
    ])] public function getColumns():array
    {
        return [
            'evaluation_type' => new Column(['title' => __('models/evaluations.fields.evaluation_type'), 'data' => 'evaluation_type']),
            'basic_competencies' => new Column(['title' => __('models/evaluations.fields.basic_competencies'), 'data' => 'basic_competencies']),
            'achievements' => new Column(['title' => __('models/evaluations.fields.achievements'), 'data' => 'achievements']),
            'user_id' => new Column([
                'title' => __('models/evaluations.fields.user_id'),
                'data' => 'user_id',
                'render' => '`${full.user.personal.firstname} ${full.user.personal.lastname ? full.user.personal.lastname : ""}`'
            ]),
            'evaluation_id' => new Column([
                'title' => __('models/evaluations.fields.evaluation_id'),
                'data' => 'evaluation_id',
                'render' => 'function(){
                    switch(full.evaluation_type) {
                        case "SKALA":
                            return `${full.scala.student.name} ( Kelas: ${full.scala.student.class_room.name} ) | ${full.scala.indicator}`;
                            break;
                        case "HASIL KARYA":
                            return `${full.attainment_detail.student.name} ( Kelas: ${full.attainment_detail.student.class_room.name} ) | ${full.attainment_detail.title}`;
                            break;
                        case "ANEKDOT":
                            return `${full.anecdote_evaluation_detail.student.name} ( Kelas: ${full.anecdote_evaluation_detail.student.class_room.name} ) | ${full.anecdote_evaluation_detail.location}`;
                            break;
                        default:
                            return "";
                    }
                }'
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
        return 'Evaluasi ' . time();
    }
}
