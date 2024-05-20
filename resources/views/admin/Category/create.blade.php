@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Category</h1>
    <form method="POST" action="{{ route('configuration.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <h2 class="mt-5">Categories</h2>
    <div class="d-flex flex-wrap">
        @foreach($categories as $category)
            <button class="btn btn-secondary m-2">{{ $category->name }}</button>
        @endforeach
    </div>
</div>
@endsection


