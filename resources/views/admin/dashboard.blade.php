@extends('layouts.dash_master')
@section('title')
<title>{{__('Dashboard')}}</title>
@endsection
@include('layouts.admin_sidebar')
@section('dash-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{__('Dashboard')}}</h1>
      </div>
 
      <div class="section-body">
 
        {{-- التاريخ --}}
        <div class="row mb-2">
          <div class="col-12">
            <h5><strong>{{ __('Today') }}:</strong> {{ date('Y-m-d') }}</h5>
          </div>
        </div>
 
        <div class="row">
 
          {{-- Total Clinics --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-clinic-medical"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{ __('Total Clinics') }}</h4>
                </div>
                <div class="card-body">
                  {{ $totalClinics }}
                </div>
              </div>
            </div>
          </div>
 
          {{-- Total Categories --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-layer-group"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{ __('Total Categories') }}</h4>
                </div>
                <div class="card-body">
                  {{ $totalCategories }}
                </div>
              </div>
            </div>
          </div>
 
          {{-- Total Countries --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-info">
                <i class="fas fa-globe"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{ __('Total Countries') }}</h4>
                </div>
                <div class="card-body">
                  {{ $totalCountries }}
                </div>
              </div>
            </div>
          </div>
 
          {{-- Total Cities --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="fas fa-city"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{ __('Total Cities') }}</h4>
                </div>
                <div class="card-body">
                  {{ $totalCities }}
                </div>
              </div>
            </div>
          </div>
 
        </div>
      </div>
    </section>
</div>
@endsection