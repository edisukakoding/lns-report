<!-- Attainment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attainment_id', __('models/attainmentDetails.fields.attainment_id').':') !!}
    {!! Form::select('attainment_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/attainmentDetails.fields.student_id').':') !!}
    {!! Form::select('student_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/attainmentDetails.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/attainmentDetails.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/attainmentDetails.fields.image').':') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attainmentDetails.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
