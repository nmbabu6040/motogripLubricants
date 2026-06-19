@extends('admin.layouts.app')

@section('content')


    <div class="card">

        <div class="card-header">

            <h4>

                Add FAQ

            </h4>

        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('faqs.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Question

                    </label>

                    <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Answer

                    </label>

                    <textarea name="answer" rows="6" class="form-control" required>{{ old('answer') }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Sort Order

                    </label>

                    <input type="number" name="sort_order" class="form-control" value="0">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select name="status" class="form-control">

                        <option value="1">

                            Active

                        </option>

                        <option value="0">

                            Inactive

                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">

                    Save FAQ

                </button>

                <a href="{{ route('faqs.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>


@endsection
