<nav class="navbar navbar-expand-lg navbar-light bg-white menuNav">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">

            @if ($setting && $setting->logo)
                <img src="{{ asset('storage/settings/' . $setting->logo) }}" width="120">
            @else
                {{ $setting->brand_name ?? 'MOTOGRIP' }}
            @endif

        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto frontMenu">

                @foreach ($menus as $menu)
                    @if ($menu->title == 'Products')
                        <li class="nav-item dropdown position-static">

                            <a class="nav-link dropdown-toggle
                {{ request()->routeIs('category.show') ||
                request()->routeIs('subcategory.show') ||
                request()->routeIs('product.details')
                    ? 'active fw-bold text-warning'
                    : '' }}"
                                href="#" data-bs-toggle="dropdown">

                                {{ $menu->title }}

                            </a>

                            <div class="dropdown-menu w-100 border-0 shadow p-4">

                                <div class="row">

                                    @foreach ($menuCategories as $category)
                                        <div class="col-lg-3">

                                            <a href="{{ route('category.show', $category->slug) }}"
                                                class="fw-bold text-dark text-decoration-none d-block mb-2">

                                                {{ $category->name }}

                                            </a>

                                            @foreach ($category->subCategories as $sub)
                                                <a href="{{ route('subcategory.show', $sub->slug) }}"
                                                    class="dropdown-item px-0">

                                                    {{ $sub->name }}

                                                </a>
                                            @endforeach

                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </li>
                    @elseif ($menu->children->count())
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle
                {{ collect($menu->children)->contains(function ($child) {
                    return request()->is(trim($child->url, '/'));
                })
                    ? 'active fw-bold text-warning'
                    : '' }}"
                                href="#" data-bs-toggle="dropdown">

                                {{ $menu->title }}

                            </a>

                            <ul class="dropdown-menu">

                                @foreach ($menu->children as $child)
                                    <li>

                                        <a class="dropdown-item
                            {{ request()->is(trim($child->url, '/')) ? 'active' : '' }}"
                                            href="{{ url($child->url) }}">

                                            {{ $child->title }}

                                        </a>

                                    </li>
                                @endforeach

                            </ul>

                        </li>
                    @else
                        <li class="nav-item">

                            <a href="{{ url($menu->url) }}"
                                class="nav-link
                {{ request()->is(trim($menu->url, '/')) ? 'active fw-bold text-warning' : '' }}">

                                {{ $menu->title }}

                            </a>

                        </li>
                    @endif
                @endforeach

            </ul>


            <form action="{{ route('products') }}" method="GET" class="d-flex ms-lg-3 mt-3 mt-lg-0">

                <input type="text" name="search" class="form-control border-success"
                    placeholder="Search Products..." value="{{ request('search') }}">

                <button class="btn btn-success ms-2">

                    Search

                </button>

            </form>

            <button id="theme-toggle" class="btn btn-outline-success ms-2">

                🌙

            </button>

        </div>

    </div>

</nav>
