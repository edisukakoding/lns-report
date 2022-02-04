<!-- Id Field -->
{{--<div class="form-group">--}}
{{--    {!! Form::label('id', __('models/periodSettings.fields.id').':') !!}--}}
{{--    <p>{{ $periodSetting->id }}</p>--}}
{{--</div>--}}

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/periodSettings.fields.title').':') !!}
    <p>{{ $periodSetting->title }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/periodSettings.fields.status').':') !!}
    <p>{{ $periodSetting->status ? 'Aktif' : 'Non Aktif' }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/periodSettings.fields.description').':') !!}
    <p>{{ $periodSetting->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/periodSettings.fields.created_at').':') !!}
    <p>{{ $periodSetting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/periodSettings.fields.updated_at').':') !!}
    <p>{{ $periodSetting->updated_at }}</p>
</div>

