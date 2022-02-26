<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', __('models/aspectSettings.fields.category').':') !!}
    {!! Form::select('category', \App\Helpers\Helper::assoc_of_array(\Illuminate\Support\Facades\Config::get('constants.aspect_categories'), '- Pilih Kategori -'), null, ['class' => 'form-control']) !!}
</div>

<!-- Subcategory Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcategory', __('models/aspectSettings.fields.subcategory').':') !!}
    {!! Form::select('subcategory',\App\Helpers\Helper::assoc_of_array(\Illuminate\Support\Facades\Config::get('constants.aspect_subcategories'), '- Pilih Sub Kategori -'), null, ['class' => 'form-control']) !!}
</div>

<!-- Point Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('index', __('models/aspectSettings.fields.index').':') !!}
    {!! Form::number('index', null, ['class' => 'form-control']) !!}
</div>

<!-- Point Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('point', __('models/aspectSettings.fields.point').':') !!}
    {!! Form::textarea('point', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('aspectSettings.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
