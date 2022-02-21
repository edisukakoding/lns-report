<!-- Attainment Id Field -->
<div class="form-group">
    {!! Form::label('attainment_id', __('models/attainmentDetails.fields.attainment_id').':') !!}
    <p>{{ 'Kelas : ' . $attainmentDetail->attainment->classRoom->name . ' ( ' . $attainmentDetail->attainment->date->format('Y-m-d') . ' )' }}</p>
</div>

<!-- Student Id Field -->
<div class="form-group">
    {!! Form::label('student_id', __('models/attainmentDetails.fields.student_id').':') !!}
    <p>{{ $attainmentDetail->student->name }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/attainmentDetails.fields.title').':') !!}
    <p>{{ $attainmentDetail->title }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/attainmentDetails.fields.image').':') !!}
    <img src="{{ \Illuminate\Support\Facades\Storage::url($attainmentDetail->image) }}" alt="">
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/attainmentDetails.fields.description').':') !!}
    <p>{!! $attainmentDetail->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/attainmentDetails.fields.created_at').':') !!}
    <p>{{ $attainmentDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/attainmentDetails.fields.updated_at').':') !!}
    <p>{{ $attainmentDetail->updated_at }}</p>
</div>

