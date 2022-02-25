<!-- Evaluation Type Field -->
<div class="form-group">
    {!! Form::label('evaluation_type', __('models/evaluations.fields.evaluation_type').':') !!}
    <p>{{ $evaluation->evaluation_type }}</p>
</div>

<!-- Basic Competencies Field -->
<div class="form-group">
    {!! Form::label('basic_competencies', __('models/evaluations.fields.basic_competencies').':') !!}
    <p>{{ $evaluation->basic_competencies }}</p>
</div>

<!-- Achievements Field -->
<div class="form-group">
    {!! Form::label('achievements', __('models/evaluations.fields.achievements').':') !!}
    <p>{{ $evaluation->achievements }}</p>
</div>

<!-- Evaluation Id Field -->
<div class="form-group">
    {!! Form::label('evaluation_id', __('models/evaluations.fields.evaluation_id').':') !!}
    @switch($evaluation->evaluation_type)
        @case('SKALA')
            <table class="table table-borderless table-sm" style="width: auto">
                <tr>
                    <td>Anak</td>
                    <td>: {{ $evaluation->scala->student->name }}</td>
                </tr>
                <tr>
                    <td>Kelompok Belajar</td>
                    <td>: {{ $evaluation->scala->student->classRoom->name }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: {{ $evaluation->scala->indicator }}</td>
                </tr>
            </table>
            @break
        @case('HASIL KARYA')
            <table class="table table-borderless table-sm" style="width: auto">
                <tr>
                    <td>Anak</td>
                    <td>: {{ $evaluation->attainmentDetail->student->name }}</td>
                </tr>
                <tr>
                    <td>Kelompok Belajar</td>
                    <td>: {{ $evaluation->attainmentDetail->student->classRoom->name }}</td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>: {{ $evaluation->attainmentDetail->title }}</td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: {!! \Illuminate\Support\Str::limit(strip_tags($evaluation->attainmentDetail->description), 100, '<a href="' . route('attainmentDetails.show', $evaluation->attainmentDetail->id) . '">...</a>') !!}</td>
                </tr>
            </table>
            @break
        @case('ANEKDOT')
            <table class="table table-borderless table-sm" style="width: auto">
                <tr>
                    <td>Anak</td>
                    <td>: {{ $evaluation->anecdoteEvaluationDetail->student->name }}</td>
                </tr>
                <tr>
                    <td>Kelompok Belajar</td>
                    <td>: {{ $evaluation->anecdoteEvaluationDetail->student->classRoom->name }}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>: {{ $evaluation->anecdoteEvaluationDetail->location }}</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>: {{ $evaluation->anecdoteEvaluationDetail->time }}</td>
                </tr>
                <tr>
                    <td>Peristiwa</td>
                    <td>: {!! \Illuminate\Support\Str::limit(strip_tags($evaluation->anecdoteEvaluationDetail->incident), 100, '<a href="' . route('anecdoteEvaluationDetails.show', $evaluation->anecdoteEvaluationDetail->id) . '">...</a>') !!}</td>
                </tr>
            </table>
            @break
    @endswitch
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/evaluations.fields.created_at').':') !!}
    <p>{{ $evaluation->created_at->diffForHumans() }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/evaluations.fields.updated_at').':') !!}
    <p>{{ $evaluation->updated_at->diffForHumans() }}</p>
</div>

