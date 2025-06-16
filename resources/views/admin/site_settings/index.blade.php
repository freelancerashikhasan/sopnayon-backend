@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>Company Information</h5>

                    <form method="POST" action="{{ route('site-settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-16" placeholder="Name" aria-label="Name" aria-describedby="Name" name="name" value="{{ $data->name ?? '' }}">
                        <input type="text" class="form-control mb-16" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1" name="phone" value="{{ $data->phone ?? '' }}">
                        <input type="text" class="form-control mb-16" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1" name="address"  value="{{ $data->address ?? '' }}">
                        <input type="text" class="form-control mb-16" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" name="email"  value="{{ $data->email ?? '' }}">
                        <input type="file" name="logo">
                        <div>
                            <img style="width: 150px;margin-top: 20px;" src="{{ asset('storage/company/'.$data->logo) }}" alt="">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>Chairman Information</h5>

                    <form method="POST" action="{{ route('site-settings.chairman-information.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="chairman_text" class="w-100" id="" rows="10">{!! $data->chairman_text !!}</textarea>
                        <textarea name="chairman_text_bn" class="w-100" id="" rows="10">{!! $data->chairman_text_bn !!}</textarea>
                        <input type="file" name="chairman_image">
                        <div>
                            <img style="width: 150px;margin-top: 20px;" src="{{ asset('storage/company/'.$data->chairman_image) }}" alt="">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>Secretary Information</h5>

                    <form method="POST" action="{{ route('site-settings.sacretary-information.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="secretary_text" class="w-100" id="" rows="10">{!! $data->secretary_text !!}</textarea>
                        <textarea name="secretary_text_bn" class="w-100" id="" rows="10">{!! $data->secretary_text_bn !!}</textarea>
                        <input type="file" name="secretary_image">
                        <div>
                            <img style="width: 150px;margin-top: 20px;" src="{{ asset('storage/company/'.$data->secretary_image) }}" alt="">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>About Us</h5>

                    <form method="POST" action="{{ route('site-settings.about_us.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="about_us" class="w-100" id="" rows="10">{!! $data->about_us !!}</textarea>
                        <textarea name="about_us_bn" class="w-100" id="" rows="10">{!! $data->about_us_bn !!}</textarea>

                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>Terms And Condition</h5>

                    <form method="POST" action="{{ route('site-settings.terms_and_condition.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="terms_and_condition" class="w-100" id="" rows="10">{!! $data->terms_and_condition !!}</textarea>
                        <textarea name="terms_and_condition_bn" class="w-100" id="" rows="10">{!! $data->terms_and_condition_bn !!}</textarea>

                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>Notice Board</h5>

                    <form method="POST" action="{{ route('site-settings.notice.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="notice" class="w-100" id="" rows="10">{!! $data->notice !!}</textarea>
                        <textarea name="notice_bn" class="w-100" id="" rows="10">{!! $data->notice_bn !!}</textarea>

                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card hp-contact-card mb-32">

                <div class="card-body">
                    <h5 class="card-title mb-32"><span style="padding: 5px;">|</span>Member Notice</h5>

                    <form method="POST" action="{{ route('site-settings.member-notice.store') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="member_notice" class="w-100" id="" rows="10">{!! $data->member_notice !!}</textarea>
                        <textarea name="member_notice_bn" class="w-100" id="" rows="10">{!! $data->member_notice_bn !!}</textarea>


                        <div class="text-end">
                            <button type="submit" class="btn btn-black-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
