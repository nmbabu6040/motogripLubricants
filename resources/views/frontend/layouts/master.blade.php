<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', $setting->brand_name ?? 'Motogrip')
    </title>

    <meta name="description" content="@yield('meta_description', $setting->about_short ?? 'Motogrip - Industrial Lubricants')">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="@yield('title', $setting->brand_name ?? 'Motogrip')">
    <meta property="og:description" content="@yield('meta_description', $setting->about_short ?? 'Motogrip - Industrial Lubricants')">
    <meta property="og:image" content="{{ isset($setting->logo) ? asset('storage/settings/' . $setting->logo) : '' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="keywords" content="lubricants, engine oil, hydraulic oil, industrial oil, grease, Motogrip">


    @if (isset($setting) && $setting->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/settings/' . $setting->favicon) }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')

</head>

<body>

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        new Swiper(".heroSlider", {

            loop: true,

            autoplay: {
                delay: 4000,
            },

            pagination: {
                el: ".swiper-pagination",
                clickable: true
            }

        });
    </script>

    <script>
        new Swiper(".testimonialSlider", {

            loop: true,

            autoplay: {
                delay: 4000,
            },

            spaceBetween: 30,

            pagination: {
                el: ".testimonial-pagination",
                clickable: true,
            },

            breakpoints: {

                0: {
                    slidesPerView: 1,
                },

                768: {
                    slidesPerView: 2,
                },

                1200: {
                    slidesPerView: 3,
                }

            }

        });
    </script>
    @stack('scripts')


    @if ($setting && $setting->phone)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->phone) }}" target="_blank"
            class="whatsapp-float">

            <i class="bi bi-whatsapp"></i>

        </a>
    @endif

    <a href="#" class="scroll-top"><i class="bi bi-chevron-up"></i></a>

    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-top').fadeIn();
            } else {
                $('.scroll-top').fadeOut();
            }
        });
    </script>
</body>

</html>
