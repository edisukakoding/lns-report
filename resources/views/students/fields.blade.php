<!-- Class Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_room_id', __('models/students.fields.class_room_id').':') !!}
    {!! Form::select('class_room_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/students.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', __('models/students.fields.gender').':') !!}
    {!! Form::select('gender', ['Laki - Laki' => 'Laki - Laki', ' Perempuan' => ' Perempuan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', __('models/students.fields.nik').':') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Birthplace Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthplace', __('models/students.fields.birthplace').':') !!}
    {!! Form::text('birthplace', null, ['class' => 'form-control']) !!}
</div>

<!-- Birthdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthdate', __('models/students.fields.birthdate').':') !!}
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

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', __('models/students.fields.religion').':') !!}
    {!! Form::select('religion', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Disabled Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('disabled', __('models/students.fields.disabled').':') !!}
    {!! Form::textarea('disabled', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', __('models/students.fields.address').':') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Neighbourhood Field -->
<div class="form-group col-sm-6">
    {!! Form::label('neighbourhood', __('models/students.fields.neighbourhood').':') !!}
    {!! Form::text('neighbourhood', null, ['class' => 'form-control']) !!}
</div>

<!-- Hamlet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hamlet', __('models/students.fields.hamlet').':') !!}
    {!! Form::text('hamlet', null, ['class' => 'form-control']) !!}
</div>

<!-- Village Field -->
<div class="form-group col-sm-6">
    {!! Form::label('village', __('models/students.fields.village').':') !!}
    {!! Form::text('village', null, ['class' => 'form-control']) !!}
</div>

<!-- Urban Village Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urban_village', __('models/students.fields.urban_village').':') !!}
    {!! Form::text('urban_village', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', __('models/students.fields.district').':') !!}
    {!! Form::text('district', null, ['class' => 'form-control']) !!}
</div>

<!-- Regency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regency', __('models/students.fields.regency').':') !!}
    {!! Form::text('regency', null, ['class' => 'form-control']) !!}
</div>

<!-- Postal Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postal_code', __('models/students.fields.postal_code').':') !!}
    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', __('models/students.fields.telephone').':') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/students.fields.phone').':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/students.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Kps Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_kps', __('models/students.fields.is_kps').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_kps', 0) !!}
        {!! Form::checkbox('is_kps', '1', null) !!} 1
    </label>
</div>

<!-- Is Pip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_pip', __('models/students.fields.is_pip').':') !!}
    {!! Form::text('is_pip', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationality', __('models/students.fields.nationality').':') !!}
    {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
</div>

<!-- Height Field -->
<div class="form-group col-sm-6">
    {!! Form::label('height', __('models/students.fields.height').':') !!}
    {!! Form::number('height', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', __('models/students.fields.weight').':') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Distance Home To School Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distance_home_to_school', __('models/students.fields.distance_home_to_school').':') !!}
    {!! Form::select('distance_home_to_school', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Time Go To School Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_go_to_school', __('models/students.fields.time_go_to_school').':') !!}
    {!! Form::text('time_go_to_school', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('students.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
