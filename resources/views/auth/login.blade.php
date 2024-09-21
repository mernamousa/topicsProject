<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login/Registeration</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
        <link rel="stylesheet" href="{{asset('admin/assets/css/dataTables.dataTables.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/styles.css')}}">
</head>

{{-- login auth --}}
{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}
{{-- login auth --}}
<body class="registeration-wrapper"
	style="background-image: linear-gradient(rgba(255, 255, 255, 0.735), rgba(0, 0, 0, 0.5))">

	<div class="container my-5 bg-white rounded-3">
		<div class="row">
			<div class="col-md-5 d-none d-md-block img-wrapper">
				<img src="{{asset('admin/assets/images/rear-view-young-college-student.jpg')}}" alt="">
			</div>
			<div class="col-md-7">
				<form method="POST" action="{{ route('login') }}" class="text-center h-100 px-3 d-flex flex-column justify-content-center">
					@csrf
					<h3 class="fw-semibold mb-5">LOGIN FORM</h3>
					<div class="input-group mb-3">
{{-- 						<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
 --}}						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						<img src="{{asset('admin/assets/images/user-svgrepo-com.svg')}}" alt="" class="input-group-text">
					</div>
					<div class="input-group mb-3">
{{-- 						<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
 --}}
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

						<img src="{{asset('admin/assets/images/password-svgrepo-com.svg')}}" alt="" class="input-group-text">
					</div>
					<button class="btn btn-dark px-5 mb-2">
						LOGIN
						<img src="{{asset('admin/assets/images/arrow-sm-right-svgrepo-com.svg')}}" alt="">
					</button>
					<div class="row mb-3">
						<div class="col-md-6 offset-md-2">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							
							</div>
						</div>
					</div>

					<div class="row mb-0">
						<div class="col-md-8 offset-md-2">
							{{-- <button type="submit" class="btn btn-primary">
								{{ __('Login') }}
							</button> --}}
							@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif

							
						</div>
					</div>
					<a href="{{route('register')}}" class="fw-semibold fs-6 text-decoration-none text-dark">New User?</a>
				</form>
			</div>
		</div>
	</div>
{{-- login auth --}}
{{-- @endsection --}}
{{-- login auth --}}
</body>

</html>