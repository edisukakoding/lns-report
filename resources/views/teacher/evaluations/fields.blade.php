<!-- Evaluation Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('evaluation_type', __('models/evaluations.fields.evaluation_type').':') !!}
    {!! Form::select('evaluation_type', \App\Helpers\Helper::assoc_of_array(\Illuminate\Support\Facades\Config::get('constants.evaluation_types'), '- Pilih Penilaian -'), null, ['class' => 'form-control', 'id' => 'evaluation_type']) !!}
</div>

<!-- Basic Competencies Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('basic_competencies', __('models/evaluations.fields.basic_competencies').':') !!}
    {!! Form::textarea('basic_competencies', null, ['class' => 'form-control']) !!}
</div>

<!-- Evaluation Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('evaluation_id', __('models/evaluations.fields.evaluation_id').':') !!}
    {!! Form::select('evaluation_id', ['' => ''], null, ['class' => 'form-control select2', 'id' => 'evaluation_id']) !!}
</div>

<!-- Achievements Field -->
<div class="form-group col-sm-6">
    {!! Form::label('achievements', __('models/evaluations.fields.achievements').':') !!}
    {!! Form::select('achievements', \App\Helpers\Helper::assoc_of_array(\Illuminate\Support\Facades\Config::get('constants.evaluation_indicators')), null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('evaluations.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>

@push('scripts-after')
    <script>
        $('#evaluation_type').change(function () {
            if($(this).val() === 'SKALA') {
                $('#evaluation_id').select2({
                    ajax: {
                        url: '{{ route('evaluations.getScalaEvaluations') }}',
                        dataType: "json"
                    }
                });
            }
        });

    </script>
@endpush
