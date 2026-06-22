@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">

            <h3>Website Settings</h3>

        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="card">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Company Name
                            </label>

                            <input type="text" name="company_name" class="form-control"
                                value="{{ $setting->company_name ?? '' }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Brand Name
                            </label>

                            <input type="text" name="brand_name" class="form-control"
                                value="{{ $setting->brand_name ?? '' }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Phone
                            </label>

                            <input type="text" name="phone" class="form-control" value="{{ $setting->phone ?? '' }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email" name="email" class="form-control" value="{{ $setting->email ?? '' }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                WhatsApp
                            </label>

                            <input type="text" name="whatsapp" class="form-control"
                                value="{{ $setting->whatsapp ?? '' }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Copyright
                            </label>

                            <input type="text" name="copyright" class="form-control"
                                value="{{ $setting->copyright ?? '' }}">

                        </div>

                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea name="address" rows="3" class="form-control">{{ $setting->address ?? '' }}</textarea>

                        </div>

                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                About Company
                            </label>

                            <textarea name="about_short" rows="5" class="form-control">{{ $setting->about_short ?? '' }}</textarea>

                        </div>

                        <div class="col-md-3 mb-3">

                            <label>About Image</label>

                            @if (!empty($setting->about_image))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->about_image) }}" height="100">
                                </div>
                            @endif

                            <input type="file" name="about_image" class="form-control">

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Mission Image
                            </label>

                            @if (!empty($setting->mission_image))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->mission_image) }}" height="100">
                                </div>
                            @endif

                            <input type="file" name="mission_image" class="form-control">

                        </div>

                        <div class="col-md-3 mb-3">

                            <label class="form-label">
                                Vision Image
                            </label>

                            @if (!empty($setting->vision_image))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->vision_image) }}" height="100">
                                </div>
                            @endif

                            <input type="file" name="vision_image" class="form-control">

                        </div>

                        <div class="mb-3 col-md-3">

                            <label class="form-label">
                                Chairman Image
                            </label>

                            @if (!empty($setting->chairman_image))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->chairman_image) }}" height="100">
                                </div>
                            @endif

                            <input type="file" name="chairman_image" class="form-control">

                        </div>


                        <div class=" col-md-12 mb-3">

                            <label>Mission</label>

                            <textarea name="mission" rows="4" class="form-control">{{ $setting->mission ?? '' }}</textarea>

                        </div>



                        <div class="mb-3 col-md-12">

                            <label>Vision</label>

                            <textarea name="vision" rows="4" class="form-control">{{ $setting->vision ?? '' }}</textarea>

                        </div>


                        <div class="mb-3 col-md-6">

                            <label class="form-label">
                                Chairman Name
                            </label>

                            <input type="text" name="chairman_name" class="form-control"
                                value="{{ $setting->chairman_name ?? '' }}">

                        </div>

                        <div class="mb-3 col-md-6">

                            <label class="form-label">
                                Chairman Designation
                            </label>

                            <input type="text" name="chairman_designation" class="form-control"
                                value="{{ $setting->chairman_designation ?? '' }}">

                        </div>



                        <div class="mb-3 col-md-12">

                            <label class="form-label">
                                Chairman Message
                            </label>

                            <textarea name="chairman_message" rows="6" class="form-control">{{ $setting->chairman_message ?? '' }}</textarea>

                        </div>





                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Facebook URL
                            </label>

                            <input type="text" name="facebook" class="form-control"
                                value="{{ $setting->facebook ?? '' }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                LinkedIn URL
                            </label>

                            <input type="text" name="linkedin" class="form-control"
                                value="{{ $setting->linkedin ?? '' }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                YouTube URL
                            </label>

                            <input type="text" name="youtube" class="form-control"
                                value="{{ $setting->youtube ?? '' }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Instagram URL
                            </label>

                            <input type="text" name="instagram" class="form-control"
                                value="{{ $setting->instagram ?? '' }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Header Logo
                            </label>

                            @if (!empty($setting->logo))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->logo) }}" height="70">
                                </div>
                            @endif

                            <input type="file" name="logo" class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Footer Logo
                            </label>

                            @if (!empty($setting->footer_logo))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->footer_logo) }}" height="70">
                                </div>
                            @endif

                            <input type="file" name="footer_logo" class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Favicon
                            </label>

                            @if (!empty($setting->favicon))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/settings/' . $setting->favicon) }}" height="32">
                                </div>
                            @endif

                            <input type="file" name="favicon" class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Catalog PDF
                            </label>

                            @if (!empty($setting->catalog_pdf))
                                <div class="mb-2">
                                    <a href="{{ asset('storage/settings/' . $setting->catalog_pdf) }}" target="_blank"
                                        class="btn btn-sm btn-info">
                                        View Current Catalog
                                    </a>
                                </div>
                            @endif

                            <input type="file" name="catalog_pdf" class="form-control">

                        </div>

                    </div>

                    <button type="submit" class="btn btn-success">
                        Save Settings
                    </button>

                </div>

            </div>

        </form>

    </div>
@endsection
