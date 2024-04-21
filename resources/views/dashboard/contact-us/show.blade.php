@extends('layouts.admin.base')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Detail Of The Message</h2>
    </div>
    <div>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $contactUs->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contactUs->email }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $contactUs->phone }}">
        </div>

        <div class="mb-3">
            <label for="Subject" class="form-label">Subject:</label>
            <textarea class="form-control" id="Subject" name="Subject" required>{{ $contactUs->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" required>{{ $contactUs->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Back To Messages</button>
    </div>
@endsection
