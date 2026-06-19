@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>

            FAQ List

        </h3>

        <a href="{{ route('faqs.create') }}" class="btn btn-primary">

            Add FAQ

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th width="80">

                            ID

                        </th>

                        <th>

                            Question

                        </th>

                        <th width="120">

                            Sort

                        </th>

                        <th width="120">

                            Status

                        </th>

                        <th width="180">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($faqs as $faq)
                        <tr>

                            <td>

                                {{ $faq->id }}

                            </td>

                            <td>

                                {{ $faq->question }}

                            </td>

                            <td>

                                {{ $faq->sort_order }}

                            </td>

                            <td>

                                @if ($faq->status)
                                    <span class="badge bg-success">

                                        Active

                                    </span>
                                @else
                                    <span class="badge bg-danger">

                                        Inactive

                                    </span>
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                No FAQ Found

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
