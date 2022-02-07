<div class="row">
    <div class="col-md-4 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($personal->image) }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 col-lg-8">
        <table class="table table-hover table-borderless table-sm">
            <tr>
                <th>{{ __('models/personals.fields.firstname') }}</th>
                <td>: {{ $personal->firstname }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.lastname') }}</th>
                <td>: {{ $personal->lastname }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.user_id') }}</th>
                <td>: {{ $personal?->user?->email }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.phone') }}</th>
                <td>: {{ $personal->phone }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.address') }}</th>
                <td>: {{ $personal->address }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.birthplace') }}</th>
                <td>: {{ $personal->birthplace }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.birthdate') }}</th>
                <td>: {{ $personal->birthdate }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.graduates') }}</th>
                <td>: {{ $personal->graduates }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.created_at') }}</th>
                <td>: {{ $personal->created_at->diffForHumans() }}</td>
            </tr>
            <tr>
                <th>{{ __('models/personals.fields.updated_at') }}</th>
                <td>: {{ $personal->updated_at->diffForHumans() }}</td>
            </tr>
        </table>
    </div>
</div>
