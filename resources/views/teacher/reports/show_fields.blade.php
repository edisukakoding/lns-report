<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/reports.fields.id').':') !!}
    <p>{{ $report->id }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/reports.fields.student_id').':') !!}
    <p>{{ $report->student_id }}</p>
</div>

<!-- Aspect Field -->
<div class="form-group">
    {!! Form::label('aspect', __('models/reports.fields.aspect').':') !!}
    <p>{{ $report->aspect }}</p>
</div>

<!-- Teacher Id Field -->
<div class="form-group">
    {!! Form::label('teacher_id', __('models/reports.fields.teacher_id').':') !!}
    <p>{{ $report->teacher_id }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', __('models/reports.fields.value').':') !!}
    <p>{{ $report->value }}</p>
</div>

