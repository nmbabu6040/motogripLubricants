@extends('admin.layouts.app')

@section('content')
    <div class="mt-4">

        <h3>

            Edit Menu

        </h3>

    </div>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('menus.update', $menu) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Menu Title

                    </label>

                    <input type="text" name="title" class="form-control" value="{{ $menu->title }}" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        URL

                    </label>

                    <input type="text" name="url" class="form-control" value="{{ $menu->url }}" required>

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
                            <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>

                                {{ $parent->title }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Sort Order

                    </label>

                    <input type="number" name="sort_order" class="form-control" value="{{ $menu->sort_order }}">

                </div>

                <div class="mb-3">

                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" name="status" value="1"
                            {{ $menu->status ? 'checked' : '' }}>

                        <label class="form-check-label">

                            Active

                        </label>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">

                    Update Menu

                </button>

                <a href="{{ route('menus.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>
@endsection
