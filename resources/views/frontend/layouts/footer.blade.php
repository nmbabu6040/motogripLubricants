<footer class="footerbg text-white py-5">

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <div class="ftAbout mb-5">
                    @if ($setting->footer_logo)
                        <img src="{{ asset('storage/settings/' . $setting->footer_logo) }}" height="70" class="mb-3">
                    @endif

                    {{-- <h5>
                    {{ $setting->brand_name ?? 'Motogrip' }}
                </h5> --}}

                    <p>

                    <p>

                        {{ \Illuminate\Support\Str::limit($setting->about_short, 100) }}

                    </p>

                    </p>

                    <div class="sicon d-flex gap-2">

                        @if ($setting->facebook)
                            <a href="{{ $setting->facebook }}" target="_blank" class="">
                                <i class="bi bi-facebook fs-5"></i>
                            </a>
                        @endif

                        @if ($setting->linkedin)
                            <a href="{{ $setting->linkedin }}" target="_blank" class="">
                                <i class="bi bi-linkedin fs-5"></i>
                            </a>
                        @endif

                        @if ($setting->youtube)
                            <a href="{{ $setting->youtube }}" target="_blank" class="">
                                <i class="bi bi-youtube fs-5"></i>
                            </a>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="ftAbout mb-5">
                    <h5 class="mb-5">

                        Contact

                    </h5>

                    <p>

                        <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $setting->address }}

                    </p>

                    <p>

                        <i class="bi bi-telephone-fill text-danger me-1"></i> {{ $setting->phone }}

                    </p>

                    <p>

                        <i class="bi bi-envelope-fill text-danger me-1"></i> {{ $setting->email }}

                    </p>

                </div>
            </div>

            <div class="col-md-2">

                <div class="mb-5">
                    <h5 class="mb-5">

                        Quick Links

                    </h5>

                    <ul class="list-unstyled ftMenu">

                        @foreach ($menus as $menu)
                            @if (!$menu->parent_id)
                                <li class="mb-2">

                                    <a href="{{ url($menu->url) }}" class=" text-decoration-none">

                                        {{ $menu->title }}

                                    </a>

                                </li>
                            @endif
                        @endforeach

                    </ul>
                </div>

            </div>

            <div class="col-md-2">

                <div class="mb-5">
                    <h5 class="mb-5">

                        Download

                    </h5>

                    @if ($setting && $setting->catalog_pdf)
                        <a href="{{ asset('storage/settings/' . $setting->catalog_pdf) }}" download
                            class="btn btn-success">

                            Download Catalog

                        </a>
                    @endif

                </div>
            </div>

        </div>

        <hr>

        <div class="text-center">

            {{ $setting->copyright }}

        </div>

    </div>

</footer>

{{-- @push('style')
    <style>
        .footerBg {
            background: #063B38;
        }
    </style>
@endpush --}}
