<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/classRooms.fields.id').':') !!}
    <p>{{ $classRoom->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('homeroom', __('models/classRooms.fields.homeroom').':') !!}
    <p>{{ $classRoom->personal->firstname }} {{ $classRoom->personal->lastname }}</p>
</div>

<!-- Personal Field -->
<div class="form-group">
    {!! Form::label('name', __('models/classRooms.fields.name').':') !!}
    <p>{{ $classRoom->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/classRooms.fields.description').':') !!}
    <p>{{ $classRoom->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/classRooms.fields.created_at').':') !!}
    <p>{{ $classRoom->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/classRooms.fields.updated_at').':') !!}
    <p>{{ $classRoom->updated_at }}</p>
</div>

