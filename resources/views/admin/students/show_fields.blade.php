<table class="table table-hover table-borderless" style="width: auto">
    <tr>
        <th>{!! __('models/students.fields.class_room_id') !!}</th>
        <td>: {{ $student->classRoom->name . ' ' . $student->classRoom->description }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.name') !!}</th>
        <td>: {{ $student->name }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.gender') !!}</th>
        <td>: {{ $student->gender }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.nik') !!}</th>
        <td>: {{ $student->nik }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.birthplace') !!}</th>
        <td>: {{ $student->birthplace }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.birthdate') !!}</th>
        <td>: {{ $student->birthdate }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.religion') !!}</th>
        <td>: {{ $student->religion }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.disabled') !!}</th>
        <td>: {{ $student->disabled }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.address') !!}</th>
        <td>: {{ $student->address }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.neighbourhood') !!}</th>
        <td>: {{ $student->neighbourhood }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.hamlet') !!}</th>
        <td>: {{ $student->hamlet }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.village') !!}</th>
        <td>: {{ $student->village }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.urban_village') !!}</th>
        <td>: {{ $student->urban_village }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.district') !!}</th>
        <td>: {{ $student->district }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.regency') !!}</th>
        <td>: {{ $student->regency }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.postal_code') !!}</th>
        <td>: {{ $student->postal_code }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.telephone') !!}</th>
        <td>: {{ $student->telephone }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.phone') !!}</th>
        <td>: {{ $student->phone }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.email') !!}</th>
        <td>: {{ $student->email }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.is_kps') !!}</th>
        <td>: <i class="fas {{ $student->is_kps ? 'fa-check text-success' : 'fa-times text-danger' }}"></i></td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.is_pip') !!}</th>
        <td>: <i class="fas {{ $student->is_pip ? 'fa-check text-success' : 'fa-times text-danger' }}"></i></td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.nationality') !!}</th>
        <td>: {{ $student->nationality }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.height') !!}</th>
        <td>: {{ $student->height }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.weight') !!}</th>
        <td>: {{ $student->weight }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.distance_home_to_school') !!}</th>
        <td>: {{ $student->distance_home_to_school }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.time_go_to_school') !!}</th>
        <td>: {{ $student->time_go_to_school }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.period') !!}</th>
        <td>: {{ $student->period }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.created_at') !!}</th>
        <td>: {{ $student->created_at->diffForHumans() }}</td>
    </tr>
    <tr>
        <th>{!! __('models/students.fields.updated_at') !!}</th>
        <td>: {{ $student->updated_at->diffForHumans() }}</td>
    </tr>
</table>

