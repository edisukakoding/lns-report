@extends('layouts.app')
@section('title')
    @lang('crud.edit') @lang('models/raportDetails.singular')
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">@lang('crud.edit') @lang('models/raportDetails.singular')</h3>
                <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                    <a href="{{ route('raportDetails.index') }}"  class="btn btn-primary">@lang('crud.back')</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($raportDetail, ['route' => ['raportDetails.update', $raportDetail->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('raport_details.fields')
                                        </div>

                                    {!! Form::close() !!}
                            </div>
                         </div>
                    </div>
                 </div>
              </div>
   </div>
  </section>
@endsection
