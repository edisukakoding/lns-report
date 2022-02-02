<?php

namespace App\DataTables;

use App\Models\Student;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class StudentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'students.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model)
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
            'class_room_id' => new Column(['title' => __('models/students.fields.class_room_id'), 'data' => 'class_room_id']),
            'name' => new Column(['title' => __('models/students.fields.name'), 'data' => 'name']),
            'gender' => new Column(['title' => __('models/students.fields.gender'), 'data' => 'gender']),
            'nik' => new Column(['title' => __('models/students.fields.nik'), 'data' => 'nik']),
            'birthplace' => new Column(['title' => __('models/students.fields.birthplace'), 'data' => 'birthplace']),
            'birthdate' => new Column(['title' => __('models/students.fields.birthdate'), 'data' => 'birthdate']),
            'religion' => new Column(['title' => __('models/students.fields.religion'), 'data' => 'religion']),
            'disabled' => new Column(['title' => __('models/students.fields.disabled'), 'data' => 'disabled']),
            'address' => new Column(['title' => __('models/students.fields.address'), 'data' => 'address']),
            'neighbourhood' => new Column(['title' => __('models/students.fields.neighbourhood'), 'data' => 'neighbourhood']),
            'hamlet' => new Column(['title' => __('models/students.fields.hamlet'), 'data' => 'hamlet']),
            'village' => new Column(['title' => __('models/students.fields.village'), 'data' => 'village']),
            'urban_village' => new Column(['title' => __('models/students.fields.urban_village'), 'data' => 'urban_village']),
            'district' => new Column(['title' => __('models/students.fields.district'), 'data' => 'district']),
            'regency' => new Column(['title' => __('models/students.fields.regency'), 'data' => 'regency']),
            'postal_code' => new Column(['title' => __('models/students.fields.postal_code'), 'data' => 'postal_code']),
            'telephone' => new Column(['title' => __('models/students.fields.telephone'), 'data' => 'telephone']),
            'phone' => new Column(['title' => __('models/students.fields.phone'), 'data' => 'phone']),
            'email' => new Column(['title' => __('models/students.fields.email'), 'data' => 'email']),
            'is_kps' => new Column(['title' => __('models/students.fields.is_kps'), 'data' => 'is_kps']),
            'is_pip' => new Column(['title' => __('models/students.fields.is_pip'), 'data' => 'is_pip']),
            'nationality' => new Column(['title' => __('models/students.fields.nationality'), 'data' => 'nationality']),
            'height' => new Column(['title' => __('models/students.fields.height'), 'data' => 'height']),
            'weight' => new Column(['title' => __('models/students.fields.weight'), 'data' => 'weight']),
            'distance_home_to_school' => new Column(['title' => __('models/students.fields.distance_home_to_school'), 'data' => 'distance_home_to_school']),
            'time_go_to_school' => new Column(['title' => __('models/students.fields.time_go_to_school'), 'data' => 'time_go_to_school'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'students_datatable_' . time();
    }
}
