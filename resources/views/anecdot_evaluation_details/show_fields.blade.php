<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/anecdotEvaluationDetails.fields.id').':') !!}
    <p>{{ $anecdotEvaluationDetail->id }}</p>
</div>

<!-- Anecdot Evaluation Id Field -->
<div class="form-group">
    {!! Form::label('anecdot_evaluation_id', __('models/anecdotEvaluationDetails.fields.anecdot_evaluation_id').':') !!}
    <p>{{ $anecdotEvaluationDetail->anecdot_evaluation_id }}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', __('models/anecdotEvaluationDetails.fields.location').':') !!}
    <p>{{ $anecdotEvaluationDetail->location }}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', __('models/anecdotEvaluationDetails.fields.time').':') !!}
    <p>{{ $anecdotEvaluationDetail->time }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/anecdotEvaluationDetails.fields.student_id').':') !!}
    <p>{{ $anecdotEvaluationDetail->student_id }}</p>
</div>

<!-- Incident Field -->
<div class="form-group">
    {!! Form::label('incident', __('models/anecdotEvaluationDetails.fields.incident').':') !!}
    <p>{{ $anecdotEvaluationDetail->incident }}</p>
</div>

<!-- Basic Competencies Field -->
<div class="form-group">
    {!! Form::label('basic_competencies', __('models/anecdotEvaluationDetails.fields.basic_competencies').':') !!}
    <p>{{ $anecdotEvaluationDetail->basic_competencies }}</p>
</div>

<!-- Achievements Field -->
<div class="form-group">
    {!! Form::label('achievements', __('models/anecdotEvaluationDetails.fields.achievements').':') !!}
    <p>{{ $anecdotEvaluationDetail->achievements }}</p>
</div>

