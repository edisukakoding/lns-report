<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/anecdotEvaluations.fields.id').':') !!}
    <p>{{ $anecdotEvaluation->id }}</p>
</div>

<!-- Class Room Id Field -->
<div class="form-group">
    {!! Form::label('class_room_id', __('models/anecdotEvaluations.fields.class_room_id').':') !!}
    <p>{{ $anecdotEvaluation->class_room_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/anecdotEvaluations.fields.user_id').':') !!}
    <p>{{ $anecdotEvaluation->user_id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/anecdotEvaluations.fields.date').':') !!}
    <p>{{ $anecdotEvaluation->date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/anecdotEvaluations.fields.created_at').':') !!}
    <p>{{ $anecdotEvaluation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/anecdotEvaluations.fields.updated_at').':') !!}
    <p>{{ $anecdotEvaluation->updated_at }}</p>
</div>

