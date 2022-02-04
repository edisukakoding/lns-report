<!-- Anecdot Evaluation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('anecdot_evaluation_id', __('models/anecdotEvaluationDetails.fields.anecdot_evaluation_id').':') !!}
    {!! Form::text('anecdot_evaluation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', __('models/anecdotEvaluationDetails.fields.location').':') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', __('models/anecdotEvaluationDetails.fields.time').':') !!}
    {!! Form::date('time', null, ['class' => 'form-control','id'=>'time']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/anecdotEvaluationDetails.fields.student_id').':') !!}
    {!! Form::select('student_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Incident Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('incident', __('models/anecdotEvaluationDetails.fields.incident').':') !!}
    {!! Form::textarea('incident', null, ['class' => 'form-control']) !!}
</div>

<!-- Basic Competencies Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('basic_competencies', __('models/anecdotEvaluationDetails.fields.basic_competencies').':') !!}
    {!! Form::textarea('basic_competencies', null, ['class' => 'form-control']) !!}
</div>

<!-- Achievements Field -->
<div class="form-group col-sm-6">
    {!! Form::label('achievements', __('models/anecdotEvaluationDetails.fields.achievements').':') !!}
    {!! Form::select('achievements', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('anecdotEvaluationDetails.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
