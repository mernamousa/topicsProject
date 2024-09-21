@extends('admin.layouts.main')

@section('content')
    {{-- content --}}
    <div class="container my-5">
        <div class="mx-2">
            <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
            <form action="{{ route('testmonials.update', ['id' => $testmonial->id]) }}" method="POST" class="px-md-5"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                    <div class="col-md-10">
                        <input type="text" placeholder="e.g. Jhon Doe" class="form-control py-2" name="name"
                            value="{{ old('name', $testmonial['name']) }}" />
                        @error('name')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                        <div class="col-md-10">
                            <input type="text" placeholder="e.g. Jhon Doe" class="form-control py-2" name="jobTitle"
                                value="{{ old('jobTitle', $testmonial['jobTitle']) }}" />
                            @error('jobTitle')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">comment:</label>
                        <div class="col-md-10">
                            <textarea id="" rows="5" class="form-control" name="comment">{{ old('comment', $testmonial['comment']) }}</textarea>
                            @error('comment')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                        <div class="col-md-10">
                            <input type="hidden" name="published" value="0">
                            <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name='published'
                                value="1" @checked(old('published', $testmonial->published)) />
                            @error('published')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3 row">
                        <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;"
                                name="image" value="{{ old('image', $testmonial['image']) }}" />
                            <img src="{{ asset('admin/assets/images/testimonials/' . $testmonial['image']) }}" 431
                                alt="" style="width: 10rem;">
                            @error('image')
                                <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-md-end">
                        <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                            Edit Testimonial
                        </button>
                    </div>
            </form>
        </div>
    </div>
    </main>
    {{-- end content --}}
@endsection
