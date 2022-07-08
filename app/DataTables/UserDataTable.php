<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract
    {
        return (new EloquentDataTable($query))->addColumn('action', 'admin.users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return Builder
     */
    public function query(User $model): Builder
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
    #[ArrayShape(['name' => Column::class, 'email' => Column::class, 'role' => Column::class])] public function getColumns():array
    {
        return [
            'name' => new Column([
                'title' => __('models/users.fields.name'),
                'data' => 'name',
            ]),
            'email' => new Column(['title' => __('models/users.fields.email'), 'data' => 'email']),
            'role' => new Column([
                'title' => __('models/users.fields.role'),
                'data' => 'role',
                'render' => '`<span>${data}</span><i onclick="showInput(this, ${full.id})" class="fas fa-pencil-alt text-danger" style="position: relative;top: -5px;cursor: pointer;font-size: 10px;"></i>`'
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
        return 'users_datatable_' . time();
    }
}
