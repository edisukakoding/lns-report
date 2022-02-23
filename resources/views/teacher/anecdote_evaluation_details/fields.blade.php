<!-- Anecdote Evaluation Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('anecdote_evaluation_id', __('models/anecdoteEvaluationDetails.fields.anecdote_evaluation_id').':') !!}
    {!! Form::hidden('anecdote_evaluation_id', $anecdoteEvaluation->id) !!}
    {!! $anecdoteEvaluation->classRoom->name . ' ( ' . $anecdoteEvaluation->date->format('Y-m-d') . ' )' !!}
</div>
<!-- Student Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('student_id', __('models/anecdoteEvaluationDetails.fields.student_id').':') !!}
    {!! Form::select('student_id', \App\Models\Student::makeOptionList(), null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', __('models/anecdoteEvaluationDetails.fields.location').':') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', __('models/anecdoteEvaluationDetails.fields.time').':') !!}
    {!! Form::time('time', null, ['class' => 'form-control','id'=>'time']) !!}
</div>

<!-- Incident Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('incident', __('models/anecdoteEvaluationDetails.fields.incident').':') !!}
    {!! Form::textarea('incident', null, ['class' => 'summernote']) !!}
</div>

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
