@php
    use App\Models\Personal;
@endphp

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/classRooms.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{{--Homeroom--}}
<div class="form-group col-sm-6">
    {!! Form::label('homeroom', __('models/classRooms.fields.homeroom').':') !!}
    {!! Form::select('homeroom', Personal::getHomeroom(), null, ['class' => 'form-control select2', 'id' => 'evaluation_id']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/classRooms.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('classRooms.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
