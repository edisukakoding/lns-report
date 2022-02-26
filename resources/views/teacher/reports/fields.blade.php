<!-- Student Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('student_id', __('models/reports.fields.student_id').':') !!}
    {!! Form::select('student_id', \App\Models\Student::makeOptionList(), null, ['class' => 'form-control']) !!}
</div>

<!-- Aspect Field -->
<div class="form-group col-sm-12">
    {!! Form::label('aspect', __('models/reports.fields.aspect').':') !!}
    {!! Form::select('aspect', \App\Models\AspectSetting::makeOptionList(), null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-12">
    {!! Form::label('value', __('models/reports.fields.value').':') !!}
    {!! Form::select('value', \App\Helpers\Helper::assoc_of_array(\Illuminate\Support\Facades\Config::get('constants.result_assessments')), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reports.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
