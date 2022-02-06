<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/personals.fields.id').':') !!}
    <p>{{ $personal->id }}</p>
</div>

<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstname', __('models/personals.fields.firstname').':') !!}
    <p>{{ $personal->firstname }}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', __('models/personals.fields.lastname').':') !!}
    <p>{{ $personal->lastname }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/personals.fields.address').':') !!}
    <p>{{ $personal->address }}</p>
</div>

<!-- Birthdate Field -->
<div class="form-group">
    {!! Form::label('birthdate', __('models/personals.fields.birthdate').':') !!}
    <p>{{ $personal->birthdate }}</p>
</div>

<!-- Birthplace Field -->
<div class="form-group">
    {!! Form::label('birthplace', __('models/personals.fields.birthplace').':') !!}
    <p>{{ $personal->birthplace }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', __('models/personals.fields.phone').':') !!}
    <p>{{ $personal->phone }}</p>
</div>

<!-- Graduates Field -->
<div class="form-group">
    {!! Form::label('graduates', __('models/personals.fields.graduates').':') !!}
    <p>{{ $personal->graduates }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/personals.fields.image').':') !!}
    <p>{{ $personal->image }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/personals.fields.created_at').':') !!}
    <p>{{ $personal->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/personals.fields.updated_at').':') !!}
    <p>{{ $personal->updated_at }}</p>
</div>

