@extends('layouts.dash_master')
@section('title')
<title>{{__('Dashboard')}}</title>
@endsection
@include('layouts.user_sidebar')
@section('dash-content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{__('Dashboard')}}</h1>
      </div>
 
      <div class="section-body">
 
        {{-- التاريخ واسم العيادة --}}
       {{-- التاريخ واسم العيادة --}}
      <div class="row mb-3">
        <div class="col-12">
          <h6 class="text-muted">
            <strong>{{ __('Today') }}:</strong> {{ date('Y-m-d') }}
          </h6>
          <h6 class="text-muted">
            <strong>{{ __('Clinic') }}:</strong> {{ $center?->center_name ?? '-' }}
          </h6>
        </div>
      </div>
 
        {{-- الكروت الأربعة --}}
        <div class="row">
 
          {{-- Total Orders --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{__('Total Orders')}}</h4>
                </div>
                <div class="card-body">
                  {{ $totalOrders }}
                </div>
              </div>
            </div>
          </div>
 
          {{-- Total Patients --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-user-injured"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{__('Total Patients')}}</h4>
                </div>
                <div class="card-body">
                  {{ $totalPatients }}
                </div>
              </div>
            </div>
          </div>
 
          {{-- Total Appointments --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-info">
                <i class="fas fa-calendar-check"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{__('Total Appointments')}}</h4>
                </div>
                <div class="card-body">
                  {{ $totalAppointments }}
                </div>
              </div>
            </div>
          </div>
 
          {{-- Total Services --}}
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="fas fa-file-alt"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>{{__('Total Services')}}</h4>
                </div>
                <div class="card-body">
                  {{ $totalServices }}
                </div>
              </div>
            </div>
          </div>
 
        </div>
      </div>
    </section>
</div>
@endsection