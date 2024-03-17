@extends('layouts.admin.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>
<form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Specifying the HTTP method to be PUT -->

    <div class="mb-3">
        <label for="name" class="form-label">Category name: </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required>{{ $category->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Category</button>
</form>

@endsection
