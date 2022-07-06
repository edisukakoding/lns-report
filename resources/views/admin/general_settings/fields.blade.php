<!-- Paud Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paud_name', __('models/generalSettings.fields.paud_name').':') !!}
    {!! Form::text('paud_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Paud Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('paud_address', __('models/generalSettings.fields.paud_address').':') !!}
    {!! Form::textarea('paud_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Paud Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paud_phone_number', __('models/generalSettings.fields.paud_phone_number').':') !!}
    {!! Form::text('paud_phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Paud Fax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paud_fax', __('models/generalSettings.fields.paud_fax').':') !!}
    {!! Form::text('paud_fax', null, ['class' => 'form-control']) !!}
</div>

<!-- Paud Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paud_telephone', __('models/generalSettings.fields.paud_telephone').':') !!}
    {!! Form::text('paud_telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Paud Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paud_email', __('models/generalSettings.fields.paud_email').':') !!}
    {!! Form::email('paud_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Paud Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paud_website', __('models/generalSettings.fields.paud_website').':') !!}
    {!! Form::text('paud_website', null, ['class' => 'form-control']) !!}
</div>

<!-- Head Of Paud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('head_of_paud', __('models/generalSettings.fields.head_of_paud').':') !!}
    {!! Form::text('head_of_paud', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('generalSettings.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
