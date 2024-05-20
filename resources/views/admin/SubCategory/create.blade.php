@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Sub-Category to {{ $category->name }}</h1>
    <form method="POST" action="{{ route('subcategories.store', $category) }}">
        @csrf
        <div class="form-group">
            <label for="name">Sub-Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
