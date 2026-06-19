<nav class="navbar navbar-light my-4 admInNav rounded">

    <div class="container-fluid">

        <span class="navbar-brand text-white fw-bold">
            Admin Dashboard
        </span>

        <div class="d-flex align-items-center gap-2">


            <span class="text-white fw-bold me-2">{{ auth()->user()?->name }}</span>

            <div>
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout

                    </button>

                </form>
            </div>

        </div>

    </div>

</nav>
