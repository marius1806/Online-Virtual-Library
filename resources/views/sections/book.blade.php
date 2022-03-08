@extends('master')

@section('content')
    <h1 class="title">{{ $title }}</h1>
    @if (!$book->user_id and Auth::user()->books->count() < 3)
        <form action="{{ route('borrowBook', ['name' => $name, 'title' => $title]) }}" method="POST" class="borrow">
            @csrf
            <button value="borrow" name="borrow" class="borrow-button">Borrow</button>
        </form>
    @else
        @if ($book->user_id == Auth::user()->id)
            <p class="borrow-state" id="owned">You borrowed this book! <br> You can see it at Borrowed Books!</p>
        @else
            @if (Auth::user()->books()->count() > 2)
                <p class="borrow-state">You already borrowed 3 books!</p>
            @else
                <p class="borrow-state">Book unavailable...</p>
            @endif
        @endif
    @endif
    <h1 class="title" id="forum">Book Forum</h1>

    <!--Content-->
    <div class="text-content" id="book-comments">
        <div class="comments">
            @if ($comments->count() == 0)
                <p class="user-comment"><b>No comments available</b></p>
            @else
                @foreach ($comments as $comment)
                    @if ($comment->user->id == Auth::user()->id)
                        <form action="{{ route('deleteComment', ['name' => $name, 'title' => $title, 'id' => $comment->id]) }}" method="POST" class="delete-comment">
                            <p class="user-comment"><span id="user-name">User {{ $comment->user->name }}:</span> {{ $comment->comment }}</p>
                            @csrf
                            <button value="delete" name="delete" class="delete-button">Delete</button>
                        </form>
                    @else
                        <p class="user-comment"><span id="user-name">User {{ $comment->user->name }}:</span> {{ $comment->comment }}</p>
                    @endif
                @endforeach
            @endif
        </div>
        <form action="{{ route('postComment', ['title' => $title, 'name' => $name]) }}" method="POST" class="comment-text">
            <textarea name="comment-text" id="comment-text" cols="25" rows="5"></textarea>
            @csrf
            <button value="submit" name="submit" class="submit-button">Submit</button>
        </form>
    </div>
@endsection