<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/scalaEvaluations.fields.id').':') !!}
    <p>{{ $scalaEvaluation->id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/scalaEvaluations.fields.date').':') !!}
    <p>{{ $scalaEvaluation->date }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/scalaEvaluations.fields.student_id').':') !!}
    <p>{{ $scalaEvaluation->student_id }}</p>
</div>

<!-- Indicator Field -->
<div class="form-group">
    {!! Form::label('indicator', __('models/scalaEvaluations.fields.indicator').':') !!}
    <p>{{ $scalaEvaluation->indicator }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/scalaEvaluations.fields.user_id').':') !!}
    <p>{{ $scalaEvaluation->user_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/scalaEvaluations.fields.created_at').':') !!}
    <p>{{ $scalaEvaluation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/scalaEvaluations.fields.updated_at').':') !!}
    <p>{{ $scalaEvaluation->updated_at }}</p>
</div>

