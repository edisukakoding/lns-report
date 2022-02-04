<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/raportEtcs.fields.id').':') !!}
    <p>{{ $raportEtc->id }}</p>
</div>

<!-- Raport Id Field -->
<div class="form-group">
    {!! Form::label('raport_id', __('models/raportEtcs.fields.raport_id').':') !!}
    <p>{{ $raportEtc->raport_id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/raportEtcs.fields.title').':') !!}
    <p>{{ $raportEtc->title }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', __('models/raportEtcs.fields.note').':') !!}
    <p>{{ $raportEtc->note }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/raportEtcs.fields.created_at').':') !!}
    <p>{{ $raportEtc->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/raportEtcs.fields.updated_at').':') !!}
    <p>{{ $raportEtc->updated_at }}</p>
</div>

