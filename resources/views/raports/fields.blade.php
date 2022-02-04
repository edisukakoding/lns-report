<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/raports.fields.student_id').':') !!}
    {!! Form::select('student_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Aspect Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aspect', __('models/raports.fields.aspect').':') !!}
    {!! Form::select('aspect', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Teacher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('teacher_id', __('models/raports.fields.teacher_id').':') !!}
    {!! Form::select('teacher_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', __('models/raports.fields.value').':') !!}
    {!! Form::select('value', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('raports.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
