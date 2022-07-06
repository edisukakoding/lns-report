<!-- Id Field -->
{{--<div class="form-group">--}}
{{--    {!! Form::label('id', __('models/generalSettings.fields.id').':') !!}--}}
{{--    <p>{{ $generalSetting->id }}</p>--}}
{{--</div>--}}

<!-- Paud Name Field -->
<div class="form-group">
    {!! Form::label('paud_name', __('models/generalSettings.fields.paud_name').':') !!}
    <p contenteditable="true" class="editable" id="paud_name">{{ $generalSetting->paud_name ?? '-' }}</p>
</div>

<!-- Paud Address Field -->
<div class="form-group">
    {!! Form::label('paud_address', __('models/generalSettings.fields.paud_address').':') !!}
    <p contenteditable="true" class="editable" id="paud_address">{{ $generalSetting->paud_address ?? '-'}}</p>
</div>

<!-- Paud Phone Number Field -->
<div class="form-group">
    {!! Form::label('paud_phone_number', __('models/generalSettings.fields.paud_phone_number').':') !!}
    <p contenteditable="true" class="editable" id="paud_phone_number">{{ $generalSetting->paud_phone_number ?? '-' }}</p>
</div>

<!-- Paud Fax Field -->
<div class="form-group">
    {!! Form::label('paud_fax', __('models/generalSettings.fields.paud_fax').':') !!}
    <p contenteditable="true" class="editable" id="paud_fax">{{ $generalSetting->paud_fax ?? '-' }}</p>
</div>

<!-- Paud Telephone Field -->
<div class="form-group">
    {!! Form::label('paud_telephone', __('models/generalSettings.fields.paud_telephone').':') !!}
    <p contenteditable="true" class="editable" id="paud_telephone">{{ $generalSetting->paud_telephone ?? '-' }}</p>
</div>

<!-- Paud Email Field -->
<div class="form-group">
    {!! Form::label('paud_email', __('models/generalSettings.fields.paud_email').':') !!}
    <p contenteditable="true" type="email" class="editable" id="paud_email">{{ $generalSetting->paud_email ?? '-' }}</p>
</div>

<!-- Paud Website Field -->
<div class="form-group">
    {!! Form::label('paud_website', __('models/generalSettings.fields.paud_website').':') !!}
    <p contenteditable="true" class="editable" id="paud_website">{{ $generalSetting->paud_website ?? '-' }}</p>
</div>

<!-- Head Of Paud Field -->
{{--<div class="form-group">--}}
{{--    {!! Form::label('head_of_paud', __('models/generalSettings.fields.head_of_paud').':') !!}--}}
{{--    <p>{{ $generalSetting->head_of_paud }}</p>--}}
{{--</div>--}}

<div class="form-group action" style="display: none">
    <button class="btn btn-sm btn-secondary" id="reset">Batal</button>
    <button class="btn btn-sm btn-primary" id="submit">Simpan</button>
</div>
<!-- Created At Field -->
{{--<div class="form-group">--}}
{{--    {!! Form::label('created_at', __('models/generalSettings.fields.created_at').':') !!}--}}
{{--    <p>{{ $generalSetting->created_at }}</p>--}}
{{--</div>--}}

<!-- Updated At Field -->
{{--<div class="form-group">--}}
{{--    {!! Form::label('updated_at', __('models/generalSettings.fields.updated_at').':') !!}--}}
{{--    <p>{{ $generalSetting->updated_at }}</p>--}}
{{--</div>--}}
@push('styles-after')
<style>
    .editable {
        width: max-content;
        min-width: 200px;
        cursor: pointer;
    }

    .editable:focus {
        outline: 1px solid #c8cad5;
        padding: 0 8px;
        font-size: 13px;
    }
</style>
@endpush

@push('scripts-after')
<script>
    $('.editable').on('keyup', function() {
        $('.action').show();
    });

    $('#submit').on('click', function() {
        $(this).prop('disabled', true).text('Sending...');
        let data = {id: 1};
        $('.editable').each((i, row) => {
            data = {...data, [$(row).attr('id')] : $(row).text()}
        });
        $.ajax({
            url: '{{ route('generalSettings.update') }}',
            type: 'PUT',
            data: data,
            success: function (result) {
                if(result) {
                    setTimeout(() => {
                        $('#submit').prop('disabled', false).text('Simpan')
                        $('.action').hide();
                    }, 1000)
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    });

    $("#reset").on('click', function() {
        document.location.reload();
    });
</script>
@endpush
