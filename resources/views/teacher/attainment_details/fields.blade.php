{{--{{ dd($attainment->user) }}--}}
<!-- Attainment Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('attainment_id', __('models/attainmentDetails.fields.attainment_id').':') !!}
    <input type="hidden" name="attainment_id" value="{{ $attainment->id }}">
    <p>{{ 'Kelas: ' . $attainment->classRoom->name . ' ( '. $attainment->date->format('Y-m-d') .' )'}}</p>
</div>

<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/attainmentDetails.fields.student_id').':') !!}
    {!! Form::select('student_id', App\Models\Student::makeOptionList(), null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/attainmentDetails.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/attainmentDetails.fields.image').':') !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/attainmentDetails.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'summernote']) !!}
</div>

<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ url()->previous() }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>


@push('styles-before')
    <link href="{{ asset('stisla-master/node_modules/summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@push('scripts-before')
    <script src="{{ asset('stisla-master/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
@endpush
