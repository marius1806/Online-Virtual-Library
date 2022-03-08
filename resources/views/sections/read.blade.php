@extends('master')

@section('content')
    <h1 class="title">{{ $book->title }}</h1>

    <!-- Content -->
    <div class="text-content" id="book-content">
        {{ $book->content }}
    </div>
@endsection