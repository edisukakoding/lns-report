<div class="row m-5">
    <div class="col-md-12 col-lg-12">
        <h2>{{ ucwords($anecdoteEvaluationDetail->student->name) }}</h2>
        <span class="text-muted d-inline">
            {{ $anecdoteEvaluationDetail->anecdoteEvaluation->user->personal->firstname }}
            <span class="bullet"></span> {{
                'Kelas : ' . $anecdoteEvaluationDetail->anecdoteEvaluation->classRoom->name
                . ' ( ' . $anecdoteEvaluationDetail->anecdoteEvaluation->date->format('Y-m-d')
                . ' )'
            }}
            <span class="bullet"></span> {{ $anecdoteEvaluationDetail->time }}
            <span class="bullet"></span> {{ $anecdoteEvaluationDetail->created_at->diffForHumans() }}
        </span>
    </div>
    <div class="col-md-12 col-lg-12">
        <br>
        {!! $anecdoteEvaluationDetail->incident !!}
    </div>
</div>
