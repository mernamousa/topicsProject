@extends('admin.layouts.main')

@section('content')
    {{-- content --}}


    <div class="container my-5">
        <div class="mx-2">
            <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Category</h2>
            <form action="{{ route('categories.update', $category->id) }}" method="post" class="px-md-5">
                @csrf
                @method('put')
                <div class="form-group mb-3 row">
                    <label for="category_name" class="form-label col-md-2 fw-bold text-md-end">Category Name:</label>
                    <div class="col-md-10">
                        <input type="text" placeholder="e.g. Computer Science" class="form-control py-2"
                            name="category_name" value="{{ old('category_name', $category['category_name']) }}" />
                        @error('category_name')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-md-end">
                    <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                        Edit Category
                    </button>
                </div>
            </form>
        </div>
    </div>
    </main>
    {{-- end content --}}
@endsection
