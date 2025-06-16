@extends('layouts.admin.app', ['pageTitle' => $pageTitle])

@section('content')
    @php
        $route = Request::is('user/roles/*');
    @endphp
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            {{ $pageTitle }}
                        </div>
                        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Go Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="{{ route('staff.assing.permission.store', $staff->id) }}" method="POST">
                                @csrf
                                <div class="row mx-auto">
                                    @php
                                        $currentGroup = '';
                                    @endphp

                                    @foreach ($permissions as $key => $permission)
                                        @php
                                            $group = $permission['group'];
                                            // Remove spaces and convert to lowercase for the group label
                                            $groupLabel = Str::lower(str_replace(' ', '-', $group));
                                        @endphp

                                        @if ($group !== $currentGroup)
                                            {{-- Display a label when the group changes --}}
                                            <div class="col-md-2 d-flex align-items-center justify-content-between" style="margin-top: 10px;">
                                                <h5>{{ $group }}</h5><i class="fas fa-arrow-right"></i>
                                            </div>
                                            @php
                                                // Update the current group
                                                $currentGroup = $group;
                                            @endphp
                                        @endif

                                        <div class="col-md-2 {{ ($key == 0 ? 'col-md-5' : '' || $key == 1) ? 'col-md-5' : '' }} px-1" style="margin-top: 10px;">
                                            <label class="form-control">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission['name'] }}" {{ $staff->hasPermissionTo($permission['name']) ? 'checked' : '' }}>
                                                @php
                                                    // Extract the action from the permission name
                                                    $parts = explode('-', $permission['name']);
                                                    $action = Str::ucfirst(end($parts)) ?? Str::ucfirst($permission['name']);
                                                @endphp
                                                {{ $action }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-success w-100">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
