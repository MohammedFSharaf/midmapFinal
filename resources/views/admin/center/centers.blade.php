@extends('layouts.dash_master')
@section('title')
    <title>{{ __('centers') }}</title>
@endsection
@include('layouts.admin_sidebar')
@section('dash-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Centers') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Centers') }}</div>
                </div>
            </div>

            <div class="section-body">
                <a href="{{route('admin.center.create')}}" class="btn btn-primary "><i class="fas fa-plus"></i> {{ __('Add New') }}</a>
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __(' SN') }}</th>
                                                <th>{{ __(' Name') }}</th>
                                                <th>{{ __(' Image') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($centers as $index => $center)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $center->center_name }}</td>
                                                    <td><img width="50px" src="{{ asset('storage/files/' . ($center->center_logo ?? 'default.png')) }}"></td>

                                                    <td>
                                                        @if ($center->status == 'active')
                                                            <a href="javascript:;"
                                                                onclick="changecenterStatus({{ $center->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}"
                                                                    data-onstyle="success" data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changecenterStatus({{ $center->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}"
                                                                    data-onstyle="success" data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.center.edit',$center->id)}}" class="btn btn-info btn-sm"><i
                                                            class="fa fa-edit" aria-hidden="true" ></i></a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                            data-target="#deleteModal" class="btn btn-danger btn-sm"
                                                            onclick="deleteData({{ $center->id }})"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection
@push('js')
<script>



        function deleteData(id){
        $("#deleteForm").attr("action","{{ route('admin.center.destroy', ':id') }}".replace(':id', id))
        }
///change center Status
        function changecenterStatus(id){
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{ route('admin.center.status', ':id') }}".replace(':id', id),
            success:function(response){
                toastr.success(response)
            },
            error:function(err){


            }
        })
    }
</script>
@endpush
