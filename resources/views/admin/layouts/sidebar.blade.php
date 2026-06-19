<div class="col-md-2 footerbg h-100 py-4">

    <div class=" sidebar ">
        <h2 class=" adminTitle fw-bold p-3">
            Motogrip
        </h2>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }} text-white">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">

                <a href="{{ route('menus.index') }}"
                    class="nav-link {{ request()->routeIs('menus.*') ? 'active' : '' }} text-white">

                    Menus

                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('categories.index') }}"
                    class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }} text-white">
                    Categories
                </a>
            </li>

            <li class="nav-item">

                <a href="{{ route('sub-categories.index') }}"
                    class="nav-link {{ request()->routeIs('sub-categories.*') ? 'active' : '' }} text-white">

                    Sub Categories

                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('products.index') }}"
                    class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }} text-white">
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('blogs.index') }}"
                    class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }} text-white">

                    Blogs

                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('faqs.index') }}"
                    class="nav-link {{ request()->routeIs('faqs.*') ? 'active' : '' }} text-white">

                    FAQs

                </a>
            </li>

            <li class="nav-item">

                <a href="{{ route('galleries.index') }}"
                    class="nav-link {{ request()->routeIs('galleries.*') ? 'active' : '' }} text-white">

                    Media Gallery

                </a>

            </li>

            <li class="nav-item">

                <a href="{{ route('video-galleries.index') }}"
                    class="nav-link {{ request()->routeIs('video-galleries.*') ? 'active' : '' }} text-white">

                    Video Gallery

                </a>

            </li>

            <li class="nav-item">

                <a href="{{ route('testimonials.index') }}"
                    class="nav-link {{ request()->routeIs('testimonials.*') ? 'active' : '' }} text-white">

                    Testimonials

                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('dealer.inquiries.index') }}"
                    class="nav-link {{ request()->routeIs('dealer.inquiries.*') ? 'active' : '' }} text-white">

                    Dealer Inquiries

                </a>
            </li>

            <li class="nav-item">

                <a href="{{ route('product.inquiries.index') }}"
                    class="nav-link {{ request()->routeIs('product.inquiries.*') ? 'active' : '' }} text-white">

                    Product Inquiries

                </a>

            </li>

            <li class="nav-item">

                <a href="{{ route('contact.messages.index') }}"
                    class="nav-link {{ request()->routeIs('contact.messages.*') ? 'active' : '' }} text-white">

                    Contact Messages

                </a>

            </li>

            <li class="nav-item">

                <a href="{{ route('users.index') }}"
                    class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }} text-white">

                    Users

                </a>

            </li>


            <li class="nav-item">
                <a href="{{ route('settings.index') }}"
                    class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }} text-white">
                    Settings
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('sliders.index') }}"
                    class="nav-link {{ request()->routeIs('sliders.*') ? 'active' : '' }} text-white">

                    Sliders

                </a>
            </li>

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="mt-3">

                    @csrf

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout

                    </button>

                </form>
            </li>

        </ul>
    </div>

</div>
