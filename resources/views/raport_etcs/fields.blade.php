<!-- Raport Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raport_id', __('models/raportEtcs.fields.raport_id').':') !!}
    {!! Form::select('raport_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/raportEtcs.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', __('models/raportEtcs.fields.note').':') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('raportEtcs.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
