@extends('admin.layouts.main')

@section('content')
    {{-- content --}}
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="{{ route('categories.create') }}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new
                    category</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Created At</th>
                            <th scope="col" class="text-center">Category</th>
                            <th scope="col" class="text-center">Edit</th>
                            <th scope="col" class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row" class="text-center">{{ $category->created_at->format('d-m-Y') }}</th>
                                <td class="text-center">{{ $category->category_name }}</td>
                                <td class="text-center"><a class="text-decoration-none text-dark"
                                        href="{{ route('categories.edit', $category['id']) }}"><img
                                            src="{{ asset('admin/assets/images/edit-svgrepo-com.svg') }}"></a></td>
                                <td class="text-center">
                                    <form action="{{ route('categories.destroy', $category['id']) }}" method="post"
                                        onclick="return confirm('Are you sure you want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link m-0 p-0"><img
                                                src="{{ asset('admin/assets/images/trash-can-svgrepo-com.svg') }}"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end content --}}
@endsection
