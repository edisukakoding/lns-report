<!-- Student Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('student_id', __('models/noteAssessments.fields.student_id').':') !!}
    {!! Form::select('student_id', \App\Models\Student::makeOptionList(), null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12">
    {!! Form::label('note', __('models/noteAssessments.fields.note').':') !!}
    {!! Form::textarea('note', null, ['class' => 'summernote']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('noteAssessments.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>

@push('styles-before')
    <link href="{{ asset('stisla-master/node_modules/summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@push('scripts-before')
    <script src="{{ asset('stisla-master/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
@endpush
