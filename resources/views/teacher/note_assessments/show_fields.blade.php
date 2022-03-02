<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/noteAssessments.fields.id').':') !!}
    <p>{{ $noteAssessment->id }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/noteAssessments.fields.student_id').':') !!}
    <p>{{ $noteAssessment->student_id }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', __('models/noteAssessments.fields.note').':') !!}
    <p>{{ $noteAssessment->note }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/noteAssessments.fields.created_at').':') !!}
    <p>{{ $noteAssessment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/noteAssessments.fields.updated_at').':') !!}
    <p>{{ $noteAssessment->updated_at }}</p>
</div>

