<?php

namespace App\DataTables;

use App\Models\AttainmentDetail;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AttainmentDetailDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.attainment_details.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param AttainmentDetail $model
     * @return Builder
     */
    public function query(AttainmentDetail $model): Builder
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
        return HelperDataTable::builder(object: $this, buttons: false, searching: false, paging: false);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    #[ArrayShape(['attainment_id' => "\Yajra\DataTables\Html\Column", 'student_id' => "\Yajra\DataTables\Html\Column", 'title' => "\Yajra\DataTables\Html\Column", 'description' => "\Yajra\DataTables\Html\Column", 'image' => "\Yajra\DataTables\Html\Column"])] public function getColumns(): array
    {
        return [
            'attainment_id' => new Column(['title' => __('models/attainmentDetails.fields.attainment_id'), 'data' => 'attainment_id']),
            'student_id' => new Column(['title' => __('models/attainmentDetails.fields.student_id'), 'data' => 'student_id']),
            'title' => new Column(['title' => __('models/attainmentDetails.fields.title'), 'data' => 'title']),
            'image' => new Column(['title' => __('models/attainmentDetails.fields.image'), 'data' => 'image'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Detail Hasil Karya' . time();
    }
}
