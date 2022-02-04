<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/guards.fields.student_id').':') !!}
    {!! Form::select('student_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/guards.fields.type').':') !!}
    {!! Form::select('type', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/guards.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Birthyear Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthyear', __('models/guards.fields.birthyear').':') !!}
    {!! Form::text('birthyear', null, ['class' => 'form-control']) !!}
</div>

<!-- Graduates Field -->
<div class="form-group col-sm-6">
    {!! Form::label('graduates', __('models/guards.fields.graduates').':') !!}
    {!! Form::text('graduates', null, ['class' => 'form-control']) !!}
</div>

<!-- Job Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job', __('models/guards.fields.job').':') !!}
    {!! Form::text('job', null, ['class' => 'form-control']) !!}
</div>

<!-- Income Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income', __('models/guards.fields.income').':') !!}
    {!! Form::text('income', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('status', __('models/guards.fields.status').':') !!}
    {!! Form::textarea('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('guards.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
