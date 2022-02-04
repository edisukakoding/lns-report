<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/raports.fields.id').':') !!}
    <p>{{ $raport->id }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/raports.fields.student_id').':') !!}
    <p>{{ $raport->student_id }}</p>
</div>

<!-- Aspect Field -->
<div class="form-group">
    {!! Form::label('aspect', __('models/raports.fields.aspect').':') !!}
    <p>{{ $raport->aspect }}</p>
</div>

<!-- Teacher Id Field -->
<div class="form-group">
    {!! Form::label('teacher_id', __('models/raports.fields.teacher_id').':') !!}
    <p>{{ $raport->teacher_id }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', __('models/raports.fields.value').':') !!}
    <p>{{ $raport->value }}</p>
</div>

