@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <a href="{{ route('subcategories.create', $category) }}" class="btn btn-primary">Add Sub-Category</a>
    <ul>
        @foreach($subCategories as $subCategory)
            <li>{{ $subCategory->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
