@extends('layouts.app')
@section('title')
    @lang('models/anecdotEvaluations.singular')  @lang('crud.details') 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>@lang('models/anecdotEvaluations.singular') @lang('crud.details')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('anecdotEvaluations.index') }}"
                 class="btn btn-primary form-btn float-right">@lang('crud.back')</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('anecdot_evaluations.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection

