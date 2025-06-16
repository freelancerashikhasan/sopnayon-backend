@extends('layouts.admin.app')

@section('content')
<div class="row mb-32 gy-32">


    <div class="col-12">
        <div class="row hp-profile-mobile-menu-btn bg-black-0 hp-bg-color-dark-100 rounded py-12 px-8 px-sm-12 mb-16 mx-0">
            <div class="d-inline-block" data-bs-toggle="offcanvas" data-bs-target="#profileMobileMenu" aria-controls="profileMobileMenu">
                <button type="button" class="btn btn-text btn-icon-only">
                    <i class="ri-menu-fill hp-text-color-black-80 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>
        </div>

        <div class="row bg-black-0 hp-bg-color-dark-100 rounded pe-16 pe-sm-32 mx-0">
            <div class="col hp-profile-menu py-24" style="flex: 0 0 240px;">
                <div class="w-100">
                    <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
                        <div class="hp-menu-header-btn mb-12 text-end">
                            <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                </button>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="d-inline-block position-relative">
                                <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                    <img src="{{ asset('app-assets') }}/img/memoji/memoji-1.png">
                                </div>
                            </div>
                        </div>

                        <h3 class="mt-24 mb-4">{{ Auth::user()->name }}</h3>
                    </div>
                </div>

                <div class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                    <ul class="me-n1 mx-lg-n12">

                        <li class="mt-4 mb-16">
                            <a href="{{ route('password.change') }}" class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                <i class="iconly-Curved-Password me-16"></i>
                                <span>Password Change</span>

                                <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="hp-profile-menu-footer">
                    <img src="https://yoda.hypeople.studio/yoda-admin-template/app-assets/img/pages/profile/menu-img.svg" alt="Profile Image">
                </div>
            </div>

            <div class="hp-profile-mobile-menu offcanvas offcanvas-start" tabindex="-1" id="profileMobileMenu" aria-labelledby="profileMobileMenuLabel">
                <div class="offcanvas-header">
                    <div class="hp-menu-header-btn text-end">
                        <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <button type="button" class="btn btn-text btn-icon-only">
                                <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-inline-block" id="profile-menu-dropdown" data-bs-dismiss="offcanvas" aria-label="Close">
                        <button type="button" class="btn btn-text btn-icon-only">
                            <i class="ri-close-fill text-black-80 lh-1" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>

                <div class="offcanvas-body p-0">

                    <div class="col hp-profile-menu py-24" style="flex: 0 0 240px;">
                        <div class="w-100">
                            <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center">
                                <div class="hp-menu-header-btn mb-12 text-end">
                                    <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <button type="button" class="btn btn-text btn-icon-only">
                                            <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1" style="font-size: 24px;"></i>
                                        </button>
                                    </div>


                                </div>

                                <div class="d-flex justify-content-center">
                                    <div class="d-inline-block position-relative">
                                        <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                            <img src="{{ asset('app-assets') }}/img/memoji/memoji-1.png">
                                        </div>
                                    </div>
                                </div>

                                <h3 class="mt-24 mb-4">{{ Auth::user()->name }}</h3>
                                <a href="https://yoda.hypeople.studio/cdn-cgi/l/email-protection#f4909b989b869187b48d9b9095da979b99" class="hp-p1-body"><span class="__cf_email__" data-cfemail="a5c1cac9cad7c0d6e5dccac1c48bc6cac8">[email&#160;protected]</span></a>
                            </div>
                        </div>

                        <div class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                            <ul class="me-n1 mx-lg-n12">
                                <li class="mt-4 mb-16">
                                    <a href="{{ route('password.change') }}" class="active position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                        <i class="iconly-Curved-Password me-16"></i>
                                        <span>Password Change</span>

                                        <span class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0" style="width: 2px;"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="hp-profile-menu-footer">
                            <img src="https://yoda.hypeople.studio/yoda-admin-template/app-assets/img/pages/profile/menu-img.svg" alt="Profile Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
                <div class="row">
                    <div class="col-12">
                        <h2>Change Password</h2>
                        <p class="hp-p1-body mb-0">Set a unique password to protect your account.</p>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="divider border-black-40 hp-border-color-dark-80"></div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-md-7 col-xl-5 col-xxxl-3">
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <div class="mb-24">
                                        <label for="profileOldPassword" class="form-label">Old Password :</label>
                                        <input type="password" class="form-control" name="current_password" id="profileOldPassword" placeholder="Password">
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-24">
                                        <label for="profileNewPassword" class="form-label">New Password :</label>
                                        <input type="password" name="new_password" class="form-control" id="profileNewPassword" placeholder="Password">
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-24">
                                        <label for="profileConfirmPassword" class="form-label">Confirm New Password :</label>
                                        <input type="password" name="new_password_confirmation" class="form-control" id="profileConfirmPassword" placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
