<?php

namespace App\DataTables;

use App\Models\AspectSetting;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AspectSettingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'teacher.aspect_settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param AspectSetting $model
     * @return Builder
     */
    public function query(AspectSetting $model): Builder
    {
        return $model::query()->orderBy('aspect_settings.index')->newQuery();
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
        'category' => "\Yajra\DataTables\Html\Column",
        'subcategory' => "\Yajra\DataTables\Html\Column",
        'point' => "\Yajra\DataTables\Html\Column",
        'index' => "\Yajra\DataTables\Html\Column",
    ])]
    public function getColumns(): array
    {
        return [
            'category' => new Column(['title' => __('models/aspectSettings.fields.category'), 'data' => 'category']),
            'subcategory' => new Column(['title' => __('models/aspectSettings.fields.subcategory'), 'data' => 'subcategory']),
            'point' => new Column(['title' => __('models/aspectSettings.fields.point'), 'data' => 'point']),
            'index' => new Column(['title' => __('models/aspectSettings.fields.index'), 'data' => 'index']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Pengaturan Aspek' . time();
    }
}
