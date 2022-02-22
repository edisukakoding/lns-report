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
{{--    {!! Form::file('image', ['class' => 'form-control']) !!}--}}
    <div id="image-preview" class="image-preview">
        <label for="image-upload" id="image-label">Pilih File</label>
        <input type="file" name="image" id="image-upload"  style="cursor: pointer"/>
    </div>
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
    <script src="{{ asset('stisla-master/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Pilih Gambar",   // Default: Choose File
            label_selected: "Ubah Gambar",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });

        const image = '{{ isset($attainmentDetail->image) ? \Illuminate\Support\Facades\Storage::url($attainmentDetail->image) : '' }}';
        console.log(image)
        if(image !== "") {
            $('.image-preview').css({
                "background-image"  : `url(${image})`,
                "background-size"   : 'cover',
                "background-position": 'center center'
            });
            $('#image-label').text('Ubah Gambar')
        }
    </script>
@endpush
