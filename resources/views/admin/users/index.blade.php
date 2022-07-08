@extends('layouts.app')
@section('title')
    @lang('models/students.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/students.plural')</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('admin.students.table')
                </div>
            </div>
        </div>
    </section>
@endsection

@php
use \Illuminate\Support\Facades\Config;

$roles = Config::get('constants.user_role');
$html = '<div class="d-flex justify-content-start"><select class="form-control select-role" style="font-size: 12px;height: 30px;padding: 4px 10px;"><option value="">-- Pilih Role --</option>';
foreach ($roles as $role) {
    $html .= '<option value="'.$role.'">'.$role.'</option>';
}
$html .= '</select>';
$html .= '<button class="btn btn-sm btn-danger ml-1 btn-cancel" onclick="cancel(this)" style="display: none"><i class="fas fa-times-circle"></i></button>';
$html .= '<button class="btn btn-sm btn-success ml-1 btn-ok" onclick="update(this)"style="display: none"><i class="fas fa-check-circle"></i></button>';
$html .= '</div>';
@endphp

@push('scripts-after')
<script>
    function showInput(el, id) {
        const html = '{{$html}}';
        const dom = new DOMParser();
        const domHTML = dom.parseFromString(html, 'text/html');
        const text = domHTML.querySelector('body').textContent;
        $(el).parent().attr('data-id', id);
        $(el).parent().html(text);
    }

    function update(e) {
        const value = $(e).siblings('.select-role').val();
        const id = $(e).parent().parent().data('id');
        $.ajax({
            url: '{{ url('/admin/users') }}/' + id,
            type: 'PUT',
            data: {role: value},
            success: function(res) {
                if(res.status) {
                    $('.buttons-reload').trigger('click');
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    }

    $(document).on('change', function (e) {
        if($(e.target).hasClass('select-role')) {
            $(e.target).siblings().show();
        }
    });

    console.log($('.buttons-reload'));
</script>
@endpush
