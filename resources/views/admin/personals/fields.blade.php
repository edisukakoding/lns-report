<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('firstname', __('models/personals.fields.firstname').':') !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', __('models/personals.fields.lastname').':') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', __('models/personals.fields.address').':') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Birthdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthdate', __('models/personals.fields.birthdate').':') !!}
    {!! Form::date('birthdate', null, ['class' => 'form-control','id'=>'birthdate']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#birthdate').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Birthplace Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthplace', __('models/personals.fields.birthplace').':') !!}
    {!! Form::text('birthplace', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/personals.fields.phone').':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Graduates Field -->
<div class="form-group col-sm-6">
    {!! Form::label('graduates', __('models/personals.fields.graduates').':') !!}
    {!! Form::text('graduates', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/personals.fields.image').':') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('personals.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
