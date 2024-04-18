@extends('layouts.admin.base')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Messages</h1>
    </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <form action="{{ route('dashboard.ContactUs.index') }}" method="get" class="row gx-2 gy-2 align-items-center">
        <div class="col-auto">
            <input type="text" name="name" value="{{ $name }}" placeholder="Search by name" class="form-control">
        </div>
        <div class="col-auto">
            <input type="text" name="email" value="{{ $email }}" placeholder="Search by email" class="form-control">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactMessages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->subject }}</td>
                <td>{{ $message->message }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $contactMessages->links() }}
@endsection

