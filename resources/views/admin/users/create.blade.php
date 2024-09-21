@extends('admin.layouts.main')

@section('content')
    {{-- content --}}

    <div class="container my-5">
        <div class="mx-2">
            <h2 class="fw-bold fs-2 mb-5 pb-2">Add USER</h2>
            <form action="{{ route('users.store') }}" method="Post" class="px-md-5">
                @csrf
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                    <div class="col-md-5">
                        <input type="text" placeholder="First Name" class="form-control py-2" name="firstName" />
                    </div>
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="col-md-5">
                        <input type="text" placeholder="Last Name" class="form-control py-2" name="lastName" />
                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
                    <div class="col-md-10">
                        <input type="text" placeholder="e.g. Jhon33" class="form-control py-2" name="userName" />
                        @error('userName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
                    <div class="col-md-10">
                        <input type="email" placeholder="e.g. Jhon@example.com" class="form-control py-2"
                            name="email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
                    <div class="col-md-10">
                        <input type="password" placeholder="Password" class="form-control py-2" name="password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="" class="form-label col-md-2 fw-bold text-md-end">Confirm Password:</label>
                    <div class="col-md-10">
                        <input type="password" placeholder="Confirm Password" class="form-control py-2"
                            name="password_confirmation" required autocomplete="new-password" />
                        {{--  @error('firstName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
                    </div>
                </div>
                <div class="text-md-end">
                    <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>
    </main>
    {{-- end content --}}
@endsection
