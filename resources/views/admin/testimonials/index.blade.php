@extends('admin.layouts.main')

@section('content')
    {{-- content --}}
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Testimonials</h2>
                <a href="{{ route('testmonials.create') }}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new
                    testimonial</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">jobTitle</th>
                            <th scope="col">comment</th>
                            <th scope="col">Published</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testmonials as $testmonial)
                            <tr>
                                <th scope="row">{{ $testmonial->created_at->format('d-m-Y') }}</th>
                                <td>{{ $testmonial->name }}</td>
                                <td>{{ $testmonial->jobTitle }}</td>
                                <td>{{ Str::limit($testmonial->comment, 50) }}...</td>
                                <td>{{ isset($testmonial['published']) && $testmonial['published'] ? 'yes' : 'no' }}</td>
                                <td class="text-center"><a class="text-decoration-none text-dark"
                                        href="{{ route('testmonials.edit', $testmonial['id']) }}"><img
                                            src="{{ asset('admin/assets/images/edit-svgrepo-com.svg') }}"></a></td>
                                <td class="text-center"><a class="text-decoration-none text-dark"
                                        href="{{ route('testmonials.destroy', $testmonial['id']) }}"><img
                                            src="{{ asset('admin/assets/images//trash-can-svgrepo-com.svg') }}"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Trashed Testimonials</h2>

            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">jobTitle</th>
                            <th scope="col">comment</th>
                            <th scope="col">Published</th>
                            <th scope="col">Restore</th>
                            <th scope="col">Force Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashedtestmonials as $trashedtestmonial)
                            <tr>
                                <th scope="row">{{ $trashedtestmonial->created_at->format('d-m-Y') }}</th>
                                <td>{{ $trashedtestmonial->name }}</td>
                                <td>{{ $trashedtestmonial->jobTitle }}</td>
                                <td>{{ Str::limit($trashedtestmonial->comment, 50) }}...</td>
                                <td>{{ isset($trashedtestmonial['published']) && $trashedtestmonial['published'] ? 'yes' : 'no' }}
                                </td>
                                <td class="text-center"><a class="text-decoration-none text-dark"></a>
                                    <form action="{{ route('testmonials.restore', $trashedtestmonial['id']) }}"
                                        method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-link m-0 p-0"><img
                                                src="{{ asset('admin/assets/images/edit-svgrepo-com.svg') }}"></button>

                                    </form>
                                </td>
                                <td class="text-center"><a class="text-decoration-none text-dark"></a>
                                    <form action="{{ route('testmonials.forcedelete', $trashedtestmonial['id']) }}"
                                        onclick="return confirm('Are you sure you want to delete?')" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link m-0 p-0"><img
                                                src="{{ asset('admin/assets/images//trash-can-svgrepo-com.svg') }}"></button>
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
