@extends('admin.layouts.main')

@section('content')
    {{-- content --}}
    <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unReadMessages as $unReadMessage)
                            <tr>
                                <th scope="row">{{ $unReadMessage->created_at->format('d-m-Y') }}</th>
                                <td><a href="{{ route('messages.show', $unReadMessage->id) }}"
                                        class="text-decoration-none text-dark">{{ Str::limit($unReadMessage->message, 50) }}...</a>
                                </td>
                                <td>{{ $unReadMessage->senderName }}</td>
                                <td class="text-center"><a class="text-decoration-none text-dark" href="#"></a>
                                    <form action="{{ route('messages.destroy', $unReadMessage['id']) }}"
                                        onclick="return confirm('Are you sure you want to delete?')" method="post">
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
        <hr>
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-borderless display" id="_table2">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($readMessages as $readMessage)
                            <tr>
                                <th scope="row">{{ $readMessage->created_at->format('d-m-Y') }}</th>
                                <td><a href="{{ route('messages.show', $readMessage->id) }}"
                                        class="text-decoration-none text-dark">{{ Str::limit($readMessage->message, 50) }}...</a>
                                </td>
                                <td>{{ $readMessage->senderName }}</td>
                                <td class="text-center"><a class="text-decoration-none text-dark" href="#"></a>
                                    <form action="{{ route('messages.destroy', $readMessage['id']) }}"
                                        onclick="return confirm('Are you sure you want to delete?')" method="post">
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
