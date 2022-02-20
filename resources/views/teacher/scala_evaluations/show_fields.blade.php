
<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/scalaEvaluations.fields.date').':') !!}
    <p>{{ $scalaEvaluation->date->format('Y-m-d') }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/scalaEvaluations.fields.student_id').':') !!}
    <p>{{ $scalaEvaluation->student->name . ' ( ' . $scalaEvaluation->student->classRoom->name . ' )'  }}</p>
</div>

<!-- Indicator Field -->
<div class="form-group">
    {!! Form::label('indicator', __('models/scalaEvaluations.fields.indicator').':') !!}
    <p>{{ $scalaEvaluation->indicator }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/scalaEvaluations.fields.user_id').':') !!}
    <p>{{ $scalaEvaluation->teacher->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/scalaEvaluations.fields.created_at').':') !!}
    <p>{{ $scalaEvaluation->created_at->diffForHumans() }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/scalaEvaluations.fields.updated_at').':') !!}
    <p>{{ $scalaEvaluation->updated_at->diffForHumans() }}</p>
</div>

