@extends('sections.search')

@section('search-content')
    <h1 class="title">results for: <span class="book-category">{{ $name }}</span></h1>

    <!-- Content -->
    <div class="text-content">
        @if (!$books)
            <h1> We couldn't find any results </h1>
        @else
            <div class="book-titles">
                @foreach ($books as $book)
                    <a href="{{ route('accessBook', ['name' => $name, 'title' => $book->title]) }}">
                        <div class="book">
                            <h1 class="book-logo">📖</h1>
                            <p class="book-title">{{ $book->title }}</p>
                            <p class="book-author">by {{ $book->author }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif 
    </div>
@endsection