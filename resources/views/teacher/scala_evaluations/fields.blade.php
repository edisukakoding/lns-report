<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/scalaEvaluations.fields.date').':') !!}
    {!! Form::date('date', isset($scalaEvaluation->date) ? $scalaEvaluation->date->format('Y-m-d') : null , ['class' => 'form-control','id'=>'date']) !!}
</div>

<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/scalaEvaluations.fields.student_id').':') !!}
    {!! Form::select('student_id', \App\Models\Student::makeOptionList(), null, ['class' => 'form-control select2']) !!}
</div>

<!-- Indicator Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indicator', __('models/scalaEvaluations.fields.indicator').':') !!}
    {!! Form::select('indicator', \App\Models\ScalaEvaluationSetting::makeOptionList(), null, ['class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('scalaEvaluations.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
