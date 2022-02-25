<!-- Class Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_room_id', __('models/anecdoteEvaluations.fields.class_room_id').':') !!}
    {!! Form::select('class_room_id', \App\Models\ClassRoom::makeOptionList(), null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('user_id', __('models/anecdoteEvaluations.fields.user_id').':') !!}--}}
{{--    {!! Form::select('user_id', ['' => ''], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/anecdoteEvaluations.fields.date').':') !!}
    {!! Form::date('date', isset($anecdoteEvaluation) ? $anecdoteEvaluation->date : null, ['class' => 'form-control','id'=>'date']) !!}
</div>

{{--@push('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#date').datetimepicker({--}}
{{--            format: 'YYYY-MM-DD HH:mm:ss',--}}
{{--            useCurrent: false--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('anecdoteEvaluations.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
