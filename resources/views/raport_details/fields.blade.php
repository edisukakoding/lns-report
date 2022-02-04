<!-- Raport Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raport_id', __('models/raportDetails.fields.raport_id').':') !!}
    {!! Form::select('raport_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/raportDetails.fields.type').':') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/raportDetails.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result', __('models/raportDetails.fields.result').':') !!}
    {!! Form::select('result', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('raportDetails.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
