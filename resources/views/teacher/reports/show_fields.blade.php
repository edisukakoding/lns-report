<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/reports.fields.id').':') !!}
    <p>{{ $report->id }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/reports.fields.student_id').':') !!}
    <p>{{ $report->student->name }}</p>
</div>

<!-- Aspect Field -->
<div class="form-group">
    {!! Form::label('aspect', __('models/reports.fields.aspect').':') !!}
    <p>{{ $report->aspect['point'] }}</p>
</div>

<!-- Teacher Id Field -->
<div class="form-group">
    {!! Form::label('teacher_id', __('models/reports.fields.user_id').':') !!}
    <p>{{ $report->user->personal->firstname }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', __('models/reports.fields.value').':') !!}
    <p>{{ $report->value }}</p>
</div>

