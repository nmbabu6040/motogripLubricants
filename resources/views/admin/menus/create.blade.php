@extends('admin.layouts.app')

@section('content')
    <div class="mt-4">

        <h3>

            Add Menu

        </h3>

    </div>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('menus.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Menu Title

                    </label>

                    <input type="text" name="title" class="form-control" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        URL

                    </label>

                    <input type="text" name="url" class="form-control" placeholder="about-us / products / blogs"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Parent Menu

                    </label>

                    <select name="parent_id" class="form-control">

                        <option value="">

                            Main Menu

                        </option>

                        @foreach ($parentMenus as $parent)
                            <option value="{{ $parent->id }}">

                                {{ $parent->title }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Sort Order

                    </label>

                    <input type="number" name="sort_order" class="form-control" value="0">

                </div>

                <div class="mb-3">

                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" name="status" value="1" checked>

                        <label class="form-check-label">

                            Active

                        </label>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">

                    Save Menu

                </button>

                <a href="{{ route('menus.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>
@endsection
