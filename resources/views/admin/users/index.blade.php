@extends('admin.layouts.main')

@section('content')
    {{-- content --}}
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Users</h2>
                <a href="{{ route('users.create') }}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new
                    user</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Registration Date</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit</th>
                            {{-- <th scope="col">Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->created_at->format('d-m-Y') }}</th>
                                <td>{{ $user->firstName }}</td>
                                <td>{{ $user->lastName }}</td>
                                <td>{{ $user->userName }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ isset($user['active']) && $user['active'] ? 'yes' : 'no' }}</td>
                                <td class="text-center"><a class="text-decoration-none text-dark"
                                        href="{{ route('users.edit', $user['id']) }}"><img
                                            src="{{ asset('admin/assets/images/edit-svgrepo-com.svg') }}"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end content --}}
@endsection
