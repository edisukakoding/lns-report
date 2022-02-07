<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', __('models/scalaEvaluationSettings.fields.value').':') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/scalaEvaluationSettings.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('scalaEvaluationSettings.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
