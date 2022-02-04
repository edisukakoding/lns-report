<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/attainments.fields.id').':') !!}
    <p>{{ $attainment->id }}</p>
</div>

<!-- Class Room Id Field -->
<div class="form-group">
    {!! Form::label('class_room_id', __('models/attainments.fields.class_room_id').':') !!}
    <p>{{ $attainment->class_room_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/attainments.fields.user_id').':') !!}
    <p>{{ $attainment->user_id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/attainments.fields.date').':') !!}
    <p>{{ $attainment->date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/attainments.fields.created_at').':') !!}
    <p>{{ $attainment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/attainments.fields.updated_at').':') !!}
    <p>{{ $attainment->updated_at }}</p>
</div>

