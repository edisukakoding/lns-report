<div class="row m-5">
    <div class="col-md-12 col-lg-12">
        <h2>{{ ucwords($attainmentDetail->title) }}</h2>
        <span class="text-muted d-inline">
            {{ $attainmentDetail->attainment->user->name }}
            <span class="bullet"></span> {{ 'Kelas : ' . $attainmentDetail->attainment->classRoom->name . ' ( ' . $attainmentDetail->attainment->date->format('Y-m-d') . ' )' }}
            <span class="bullet"></span> {{ $attainmentDetail->created_at->diffForHumans() }}
        </span>
    </div>
    <div class="col-md-12 col-lg-12">
        @isset($attainmentDetail->image)
        <img src="{{ \Illuminate\Support\Facades\Storage::url($attainmentDetail->image) }}" alt="{{ ucwords($attainmentDetail->title) }}" class="img-fluid mx-auto d-block">
        @endisset
        <br>
        {!! $attainmentDetail->description !!}
    </div>
</div>
