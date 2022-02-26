<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/aspectSettings.fields.id').':') !!}
    <p>{{ $aspectSetting->id }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', __('models/aspectSettings.fields.category').':') !!}
    <p>{{ $aspectSetting->category }}</p>
</div>

<!-- Subcategory Field -->
<div class="form-group">
    {!! Form::label('subcategory', __('models/aspectSettings.fields.subcategory').':') !!}
    <p>{{ $aspectSetting->subcategory }}</p>
</div>

<!-- Point Field -->
<div class="form-group">
    {!! Form::label('point', __('models/aspectSettings.fields.point').':') !!}
    <p>{{ $aspectSetting->point }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/aspectSettings.fields.created_at').':') !!}
    <p>{{ $aspectSetting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/aspectSettings.fields.updated_at').':') !!}
    <p>{{ $aspectSetting->updated_at }}</p>
</div>

