<?php

namespace App\DataTables;

use App\Models\GeneralSetting;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class GeneralSettingDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return (new EloquentDataTable($query))->addColumn('action', 'general_settings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param GeneralSetting $model
     * @return Builder
     */
    public function query(GeneralSetting $model): Builder
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
    #[ArrayShape(['paud_name' => Column::class, 'paud_address' => Column::class, 'paud_phone_number' => Column::class, 'paud_fax' => Column::class, 'paud_telephone' => Column::class, 'paud_email' => Column::class, 'paud_website' => Column::class, 'head_of_paud' => Column::class])] protected function getColumns(): array
    {
        return [
            'paud_name' => new Column(['title' => __('models/generalSettings.fields.paud_name'), 'data' => 'paud_name']),
            'paud_address' => new Column(['title' => __('models/generalSettings.fields.paud_address'), 'data' => 'paud_address']),
            'paud_phone_number' => new Column(['title' => __('models/generalSettings.fields.paud_phone_number'), 'data' => 'paud_phone_number']),
            'paud_fax' => new Column(['title' => __('models/generalSettings.fields.paud_fax'), 'data' => 'paud_fax']),
            'paud_telephone' => new Column(['title' => __('models/generalSettings.fields.paud_telephone'), 'data' => 'paud_telephone']),
            'paud_email' => new Column(['title' => __('models/generalSettings.fields.paud_email'), 'data' => 'paud_email']),
            'paud_website' => new Column(['title' => __('models/generalSettings.fields.paud_website'), 'data' => 'paud_website']),
            'head_of_paud' => new Column(['title' => __('models/generalSettings.fields.head_of_paud'), 'data' => 'head_of_paud'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'general_settings_datatable_' . time();
    }
}
