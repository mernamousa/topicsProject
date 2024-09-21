@extends('admin.layouts.main')

@section('content')
    {{-- content --}}
    <div class="container my-5">
        <div class="mx-2">
            <h2 class="fw-bold fs-2 mb-5 pb-2">Add Topic</h2>
            <form action="{{ route('topics.store') }}" method="POST" class="px-md-5" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Topic Title:</label>
                    <div class="col-md-10">
                        <input type="text" placeholder="e.g. Design Patterns" class="form-control py-2" name="topicTitle"
                            value="{{ old('topicTitle') }}" />
                        @error('topicTitle')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Category:</label>
                    <div class="col-md-10">
                        <select name="category_id" id="" class="form-control py-1">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
                    <div class="col-md-10">
                        <textarea id="" rows="5" class="form-control" name="content" value="{{ old('content') }}"></textarea>
                        @error('content')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Trending:</label>
                    <div class="col-md-10">
                        <input type="hidden" name="trending" value="0">
                        <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="trending"
                            value="1" @checked(old('trending')) />
                        @error('trending')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                    <div class="col-md-10">
                        <input type="hidden" name="published" value="0">

                        <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published"
                            value="1" @checked(old('published')) />
                        @error('published')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">Number of Views:</label>
                        <div class="col-md-10">
                            <input type="number" placeholder="e.g. Design Patterns" class="form-control py-2"
                                name="NoOfViews" value="{{ old('NoOfViews') }}" />
                            @error('NoOfViews')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" style="padding: 0.7rem;" name="image"
                                value="{{ old('image') }}" />
                            @error('image')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-md-end">
                    <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                        Add Topic
                    </button>
                </div>
            </form>
        </div>
    </div>
    </main>
    {{-- end content --}}
@endsection
