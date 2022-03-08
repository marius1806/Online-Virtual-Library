@extends('master')

@section('content')
<div class="text-content">
    @if ($books->count() == 0)
        <p id="no-books">You didn't borrow books from the library yet...</p>
    @else
        <div class="book-titles">
            @foreach ($books as $book)
                    <div class="book">
                        <a href="{{ route('readBook', ['title' => $book->title]) }}">
                            <h1 class="book-logo">📖</h1>
                            <p class="book-title">{{ $book->title }}</p>
                            <p class="book-author">by {{ $book->author }}</p>
                        </a>
                        <form action="{{ route('returnBook', ['title' => $book->title]) }}" method="POST" class="bring-back">
                            @csrf
                            <button class="bring-back-button">Return book</button>
                        </form>
                    </div>
            @endforeach
        </div>
    @endif
</div>
@endsection