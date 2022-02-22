<table class="table table-borderless table-hover table-sm">
    <tr>
        <th>{{ __('models/attainments.fields.class_room_id') }}</th>
        <td>: {{ $attainment->classRoom->name }}</td>
        <th>{{ __('models/attainments.fields.created_at') }}</th>
        <td>: {{ $attainment->created_at->diffForHumans() }}</td>
    </tr>
    <tr>
        <th>{{ __('models/attainments.fields.user_id') }}</th>
        <td>: {{ $attainment->user->personal ? $attainment->user->personal->firstname . ' ' . $attainment->user?->personal?->lastname : $attainment->user->name }}</td>
        <th>{{ __('models/attainments.fields.updated_at') }}</th>
        <td>: {{ $attainment->updated_at->diffForHumans() }}</td>
    </tr>
    <tr>
        <th>{{ __('models/attainments.fields.date') }}</th>
        <td>: {{ $attainment->date->format('Y-m-d') }}</td>
    </tr>
</table>

<div class="row mt-5">
    <div class="col-md-12 col-lg-12">
        <div class="section justify-content-between d-flex">
            <h6 style="font-weight: lighter; font-size: 18px">Catatan hasil karya per tanggal: {{ $attainment->date->format('Y-m-d') }}</h6>
                <a href="{{ route('attainmentDetails.create', ['attainment_id' => $attainment->id])}}" class="btn btn-outline-primary form-btn">@lang('crud.add_new')<i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @include('teacher.attainment_details.table')
    </div>
</div>
