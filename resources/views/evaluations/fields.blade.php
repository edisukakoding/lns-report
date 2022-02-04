<!-- Evaluation Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('evaluation_type', __('models/evaluations.fields.evaluation_type').':') !!}
    {!! Form::select('evaluation_type', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Basic Competencies Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('basic_competencies', __('models/evaluations.fields.basic_competencies').':') !!}
    {!! Form::textarea('basic_competencies', null, ['class' => 'form-control']) !!}
</div>

<!-- Achievements Field -->
<div class="form-group col-sm-6">
    {!! Form::label('achievements', __('models/evaluations.fields.achievements').':') !!}
    {!! Form::select('achievements', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Period Setting Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('period_setting_id', __('models/evaluations.fields.period_setting_id').':') !!}
    {!! Form::text('period_setting_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Evaluation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('evaluation_id', __('models/evaluations.fields.evaluation_id').':') !!}
    {!! Form::select('evaluation_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('evaluations.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
