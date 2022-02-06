<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    @routes
    @yield('page_css')
    @stack('styles-before')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    @yield('page_css')
    @yield('css')
    @stack('styles-after')
    <style>
        td {
            vertical-align: middle!important;
        }
    </style>
</head>
<body>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('layouts.header')

        </nav>
        <div class="main-sidebar main-sidebar-position">
            @include('layouts.sidebar')
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @if(\App\Models\PeriodSetting::getActivePeriod() === false)
            <div class="alert alert-warning alert-has-icon">
                <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Periode tahun ajaran belum diatur</div>
                    Mohon untuk mengatur periode tahun ajar agar sistem bisa digunakan secara menyeluruh.
                    @if(\Illuminate\Support\Facades\Auth::user()->role === 'ADMIN')
                        <a href="{{route('periodSettings.create')}}"><strong>klik disini untuk membuat / mengkatifkan tahun ajar</strong></a>
                    @else
                        Silahkan hubungi Administrator
                    @endif
                </div>
            </div>
            @endif
            @yield('content')
        </div>
        <footer class="main-footer">
            @include('layouts.footer')
        </footer>
    </div>
</div>

@include('profile.change_password')
@include('profile.edit_profile')

</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
@stack('scripts-before')
<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
@yield('page_js')
@yield('scripts')
<script>
    let loggedInUser =@json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login') }}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
{{--{{dd(session()->get('warning'))}}--}}
@if(session()->has('flash_notification'))
    @foreach(session()->get('flash_notification') as $notification)
    <script>
        swal('{{ $notification->level }}', '{{ $notification->message }}', '{{ $notification->level }}');
    </script>
    @endforeach
@endif
@if(session()->has('warning'))
    <script>
        swal('Peringatan!', '{{ session()->get('warning') }}', 'warning');
    </script>
@endif
@if(session()->has('success'))
    <script>
        swal('Berhasil', '{{ session()->get('success') }}', 'success');
    </script>
@endif
@if(session()->has('error'))
    <script>
        swal('Ooops!', '{{ session()->get('error') }}', 'error');
    </script>
@endif
@stack('scripts-after')
</html>
