<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/scalaEvaluationSettings.fields.id').':') !!}
    <p>{{ $scalaEvaluationSetting->id }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', __('models/scalaEvaluationSettings.fields.value').':') !!}
    <p>{{ $scalaEvaluationSetting->value }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/scalaEvaluationSettings.fields.description').':') !!}
    <p>{{ $scalaEvaluationSetting->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/scalaEvaluationSettings.fields.created_at').':') !!}
    <p>{{ $scalaEvaluationSetting->created_at->diffForHumans() }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/scalaEvaluationSettings.fields.updated_at').':') !!}
    <p>{{ $scalaEvaluationSetting->updated_at->diffForHumans() }}</p>
</div>

