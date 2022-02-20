<?php

namespace App\DataTables;

use App\Models\PeriodSetting;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PeriodSettingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.period_settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param PeriodSetting $model
     * @return Builder
     */
    public function query(PeriodSetting $model): Builder
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
    #[ArrayShape(['title' => "\Yajra\DataTables\Html\Column", 'status' => "\Yajra\DataTables\Html\Column", 'description' => "\Yajra\DataTables\Html\Column"])] public function getColumns(): array
    {
        $active     = '<i class="fas fa-check text-success"></i>';
        $inactive   = '<i class="fas fa-times text-danger"></i>';
        return [
            'title' => new Column(['title' => __('models/periodSettings.fields.title'), 'data' => 'title']),
            'status' => new Column([
                'title' => __('models/periodSettings.fields.status'),
                'data' => 'status',
                'render' => "data == 1 ? '$active' : '$inactive'"
            ]),
            'description' => new Column(['title' => __('models/periodSettings.fields.description'), 'data' => 'description'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Pengaturan Periode ' . time();
    }
}
