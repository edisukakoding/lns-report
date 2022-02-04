<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/raportDetails.fields.id').':') !!}
    <p>{{ $raportDetail->id }}</p>
</div>

<!-- Raport Id Field -->
<div class="form-group">
    {!! Form::label('raport_id', __('models/raportDetails.fields.raport_id').':') !!}
    <p>{{ $raportDetail->raport_id }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('models/raportDetails.fields.type').':') !!}
    <p>{{ $raportDetail->type }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/raportDetails.fields.description').':') !!}
    <p>{{ $raportDetail->description }}</p>
</div>

<!-- Result Field -->
<div class="form-group">
    {!! Form::label('result', __('models/raportDetails.fields.result').':') !!}
    <p>{{ $raportDetail->result }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/raportDetails.fields.created_at').':') !!}
    <p>{{ $raportDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/raportDetails.fields.updated_at').':') !!}
    <p>{{ $raportDetail->updated_at }}</p>
</div>

