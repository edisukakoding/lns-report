@extends('layouts.app')
@section('title')
     @lang('models/classRooms.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/classRooms.plural')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('classRooms.create')}}" class="btn btn-primary form-btn">@lang('crud.add_new')<i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.class_rooms.table')
            </div>
       </div>
   </div>

    </section>
@endsection



