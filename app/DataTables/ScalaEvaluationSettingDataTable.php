<?php

namespace App\DataTables;

use App\Models\ScalaEvaluationSetting;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ScalaEvaluationSettingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.scala_evaluation_settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param ScalaEvaluationSetting $model
     * @return Builder
     */
    public function query(ScalaEvaluationSetting $model): Builder
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
    #[ArrayShape(['value' => "\Yajra\DataTables\Html\Column", 'description' => "\Yajra\DataTables\Html\Column"])]
    public function getColumns():array
    {
        return [
            'value' => new Column(['title' => __('models/scalaEvaluationSettings.fields.value'), 'data' => 'value']),
            'description' => new Column(['title' => __('models/scalaEvaluationSettings.fields.description'), 'data' => 'description'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Pengaturan Nilai Skala ' . time();
    }
}
