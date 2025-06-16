@extends('layouts.admin.app', ['pageTitle' => $pageTitle])
@section('content')
    @php
        $route = Request::is('staff/edit/*');
    @endphp
    <style>
        .select2-container--default {
            z-index: 1040 !important;
        }
    </style>
    <div class="main-content-body">
        <form action="{{ $route ? route('staff.update', $staff->id) : route('staff.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($route)
                @method('PUT')
            @endif
            <!-- Col -->
            <div class="card">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                    <p class="card-title my-0">{{ $pageTitle }}</p>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-xl-4 col-lg-4 col-md-6" style="margin-top: 10px;margin-bottom: 10px;">
                            <div class="input-group" data-bs-placement="top" data-bs-toggle="tooltip-primary" title="Name">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                <input type="text" class="@error('name') is-invalid border-danger @enderror form-control" name="name" value="{{ old('name', $route ? $staff->name : '') }}" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-lg-4 col-md-6" style="margin-top: 10px;margin-bottom: 10px;">
                            <div class="input-group" data-bs-placement="top" data-bs-toggle="tooltip-primary" title="Username">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                <input type="text" class="@error('username') is-invalid border-danger @enderror form-control" name="username" {{ $route ? 'readonly' : '' }} id="username" placeholder="Username" value="{{ $route ? $staff->username : '' }}" placeholder="{{ $route ? $staff->username : '' }}">
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-lg-4 col-md-6" style="margin-top: 10px;margin-bottom: 10px;">
                            <div class="input-group" data-bs-placement="top" data-bs-toggle="tooltip-primary" title="Email">
                                <span class="input-group-text"><i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i></span>
                                <input type="email" name="email" value="{{ old('email', $route ? $staff->email : '') }}" class="@error('email') is-invalid border-danger @enderror form-control" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-lg-4 col-md-6" style="margin-top: 10px;margin-bottom: 10px;">
                            <div class="input-group" data-bs-placement="top" data-bs-toggle="tooltip-primary" title="Phone Number">
                                <span class="input-group-text"><i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i></span>
                                <input type="number" name="phone" value="{{ old('phone', $route ? $staff->phone : '') }}" min="0" class="@error('phone') is-invalid border-danger @enderror form-control" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 mt-3">
                            <button type="submit" class="add-to-cart btn btn-success btn-block">{{ __($route ? 'Update Staff' : 'Add Staff') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Col -->
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif



    </script>
@endpush
