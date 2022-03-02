<?php

namespace App\DataTables;

use App\Models\NoteAssessment;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class NoteAssessmentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.note_assessments.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param NoteAssessment $model
     * @return Builder
     */
    public function query(NoteAssessment $model): Builder
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
    #[ArrayShape(['student_id' => "\Yajra\DataTables\Html\Column", 'note' => "\Yajra\DataTables\Html\Column"])] public function getColumns(): array
    {
        return [
            'student_id' => new Column(['title' => __('models/noteAssessments.fields.student_id'), 'data' => 'student_id']),
            'note' => new Column([
                'title' => __('models/noteAssessments.fields.note'),
                'data' => 'note',
                'render' => 'full.note'
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
        return 'Catatan Asesmen ' . time();
    }
}
