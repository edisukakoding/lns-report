<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/scalaEvaluations.fields.date').':') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', __('models/scalaEvaluations.fields.student_id').':') !!}
    {!! Form::select('student_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Indicator Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indicator', __('models/scalaEvaluations.fields.indicator').':') !!}
    {!! Form::textarea('indicator', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/scalaEvaluations.fields.user_id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('scalaEvaluations.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
