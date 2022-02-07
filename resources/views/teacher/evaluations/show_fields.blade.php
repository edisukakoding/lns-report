<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/evaluations.fields.id').':') !!}
    <p>{{ $evaluation->id }}</p>
</div>

<!-- Evaluation Type Field -->
<div class="form-group">
    {!! Form::label('evaluation_type', __('models/evaluations.fields.evaluation_type').':') !!}
    <p>{{ $evaluation->evaluation_type }}</p>
</div>

<!-- Basic Competencies Field -->
<div class="form-group">
    {!! Form::label('basic_competencies', __('models/evaluations.fields.basic_competencies').':') !!}
    <p>{{ $evaluation->basic_competencies }}</p>
</div>

<!-- Achievements Field -->
<div class="form-group">
    {!! Form::label('achievements', __('models/evaluations.fields.achievements').':') !!}
    <p>{{ $evaluation->achievements }}</p>
</div>

<!-- Period Setting Id Field -->
<div class="form-group">
    {!! Form::label('period_setting_id', __('models/evaluations.fields.period_setting_id').':') !!}
    <p>{{ $evaluation->period_setting_id }}</p>
</div>

<!-- Evaluation Id Field -->
<div class="form-group">
    {!! Form::label('evaluation_id', __('models/evaluations.fields.evaluation_id').':') !!}
    <p>{{ $evaluation->evaluation_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/evaluations.fields.created_at').':') !!}
    <p>{{ $evaluation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/evaluations.fields.updated_at').':') !!}
    <p>{{ $evaluation->updated_at }}</p>
</div>

